import { createI18n } from 'vue-i18n';

// Import your language files
import pl from './locales/pl.json';
import en from './locales/en.json';

const messages = {
    pl,
    en,
};

const i18n = createI18n({
    locale: 'pl', // set locale
    fallbackLocale: 'pl', // set fallback locale
    messages, // set locale messages
});

export default i18n;
