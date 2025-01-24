<div class="w-full">
    <div class="lg:hidden">
        <livewire:profile.partner-profile-mobile :partner="$partner" :formasDePagamento="$ativas" :services="$services" />
    </div>
    <div class="hidden lg:block">
        <livewire:profile.partner-profile-desktop :partner="$partner" :formasDePagamento="$ativas" :services="$services" />
    </div>
</div>