<x-layouts.auth>
    <x-slot:title>
        Подтверждение почты
    </x-slot:title>

    <x-post.card main_page>
        Перейдите по ссылке из письма отправленного на ваш e-mail

        <div class="pt-3">
            Или введите код:
            <x-form action="{{ route('email.confirm', $email->uuid) }}" method="POST" class="mt-3">
                <div class="grid grid-cols-5 gap-x-2">
                    <div class="col-span-3">
                        <x-form.input name="code" placeholder="123456" inputmode="decimal"/>
                    </div>
                    <div class="col-span-2">
                        <x-button type="submit">Подтвердить</x-button>
                    </div>
                </div>
            </x-form>
        </div>
    </x-post.card>

    @unless(session('email-confirmation-sent'))
        <x-slot:crosslink>
            <x-link to="#" x-data x-on:click.prevent="$refs.form.submit()">
                Отправить подтверждение еще раз
                <x-form class="d-none" x-ref="form" action="{{ route('email.send', $email->uuid) }}" method="post"/>
            </x-link>
        </x-slot:crosslink>
    @endunless
</x-layouts.auth>
