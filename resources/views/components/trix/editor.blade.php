<trix-editor class="trix-content bg-white rounded-lg border-gray-300"
             input="x"
             x-data='{
        uploadAttachment(event) {
        if (! event.attachment?.file) return
             const form = new FormData()
             form.append("file", event.attachment.file)
                fetch("{{ route('trix.store') }}",
                    {
                        method: "POST",
                        body: form,
                        headers: {
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value,
                        }
                            }).then(resp => resp.json()).then((data) => {
                                event.attachment.setAttributes({
                                url: data.url,
                                href: data.url
                            })
                    }).catch(() => event.attachment.remove());
                 },

        deleteAttachment(event) {
            const attachmentUrl = event.attachment.attachment.attributes.values.url;

            if (!attachmentUrl) return;
                fetch("{{ route('trix.delete') }}", {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value,
                    },
                    body: JSON.stringify({ url: attachmentUrl, }),
                });
        }
    }'

             x-on:trix-attachment-add="uploadAttachment"
             x-on:trix-attachment-remove="deleteAttachment"
></trix-editor>
