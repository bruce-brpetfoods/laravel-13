function initImageUpload({
    inputId,
    previewId,
    fieldName = 'image',
    successMessage = 'Imagem atualizada!'
}) {

    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);

    if (!input || !preview || input.dataset.initialized) {
        return;
    }

    input.dataset.initialized = 'true';

    input.addEventListener('change', async (e) => {

        const file = e.target.files[0];
        const recordId = input.dataset.recordId;

        if (!file) {
            return;
        }

        // Preview
        preview.src = URL.createObjectURL(file);

        // Upload
        const formData = new FormData();

        formData.append(fieldName, file);
        formData.append('record_id', recordId);

        try {

            const response = await fetch(
                input.dataset.uploadUrl,
                {
                    method: 'POST',

                    headers: {
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            ?.content,

                        'Accept': 'application/json'
                    },

                    body: formData
                }
            );

            const data = await response.json();

            if (!response.ok) {
                throw new Error(
                    data.message || 'Erro ao enviar imagem.'
                );
            }

            preview.src = `${data.path}?v=${Date.now()}`;

            Flux.toast({
                variant: 'success',
                text: successMessage,
            });

        } catch (error) {

            Flux.toast({
                variant: 'danger',
                text: error.message || 'Erro ao enviar imagem.',
            });
        }
    });
}

function initUploads() {
    // Avatar
    initImageUpload({
        inputId: 'avatarInput',
        previewId: 'avatarPreview',
        fieldName: 'avatar',
        successMessage: 'Imagem atualizada!'
    });

    // Drawing
    initImageUpload({
        inputId: 'drawingImageInput',
        previewId: 'drawingImagePreview',
        fieldName: 'image',
        successMessage: 'Imagem da partícula atualizada!'
    });
}

document.addEventListener(
    'DOMContentLoaded',
    initUploads
);

document.addEventListener(
    'livewire:navigated',
    initUploads
);