<x-buttons.secondary x-data="themeSwitcher()" x-on:click="toggleTheme">
    <template x-if="theme === 'light'">
        <x-icons.sun />
    </template>
    <template x-if="theme === 'dark'">  
        <x-icons.moon />
    </template>
</x-buttons.secondary>