<div class="flex w-full">
    <div class="lg:hidden">
        <livewire:profile.partner-profile-mobile :partner="$partner" />
    </div>
    <div class="hidden lg:block">
        <livewire:profile.partner-profile-desktop :partner="$partner" />
    </div>
</div>