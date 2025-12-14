export default function themeSwitcher() {
    return {
        theme: localStorage.getItem('theme') || 'dark',

        toggleTheme() {
            // Cycle light → dark → light
            this.theme = this.theme === 'light' ? 'dark' : 'light';
            this.applyTheme();
        },

        applyTheme() {
            document.documentElement.setAttribute('data-theme', this.theme);
            localStorage.setItem('theme', this.theme);
        }
    }
}