import Alpine from 'alpinejs'
import themeSwitcher from './components/theme';
import chevron from './components/chevron';
 
window.Alpine = Alpine
 
Alpine.data('themeSwitcher', themeSwitcher);
Alpine.data('chevron', chevron);
Alpine.start()