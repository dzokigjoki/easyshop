var GlobalModule = (function() {

    var alphabet = {
            'а': 'a',
            'б': 'b',
            'в': 'v',
            'г': 'g',
            'д': 'd',
            'ѓ': 'gj',
            'е': 'e',
            'ж': 'z',
            'з': 'z',
            'ѕ': 'dz',
            'и': 'i',
            'ј': 'j',
            'к': 'k',
            'л': 'l',
            'љ': 'lj',
            'м': 'm',
            'н': 'n',
            'њ': 'nj',
            'о': 'o',
            'п': 'p',
            'р': 'r',
            'с': 's',
            'т': 't',
            'ќ': 'kj',
            'у': 'u',
            'ф': 'f',
            'х': 'h',
            'ц': 'c',
            'ч': 'ch',
            'џ': 'dz',
            'ш': 'sh',

            'A': 'a',
            'Б': 'b',
            'В': 'v',
            'Г': 'g',
            'Д': 'd',
            'Ѓ': 'gj',
            'Е': 'e',
            'Ж': 'z',
            'З': 'z',
            'Ѕ': 'dz',
            'И': 'i',
            'Ј': 'j',
            'К': 'k',
            'Л': 'l',
            'Љ': 'lj',
            'М': 'm',
            'Н': 'n',
            'Њ': 'nj',
            'О': 'o',
            'П': 'p',
            'Р': 'r',
            'С': 's',
            'Т': 't',
            'Ќ': 'kj',
            'У': 'u',
            'Ф': 'f',
            'Х': 'h',
            'Ц': 'c',
            'Ч': 'ch',
            'Џ': 'dz',
            'Ш': 'sh',

            'А': 'a',
            'B': 'b',
            'C': 'c',
            'D': 'd',
            'E': 'e',
            'F': 'f',
            'G': 'g',
            'H': 'h',
            'I': 'i',
            'J': 'j',
            'K': 'k',
            'L': 'l',
            'M': 'm',
            'N': 'n',
            'O': 'o',
            'P': 'p',
            'Q': 'q',
            'R': 'r',
            'S': 's',
            'T': 't',
            'U': 'u',
            'V': 'v',
            'W': 'w',
            'X': 'x',
            'Y': 'y',
            'Z': 'z',

            ' ': '-',
            ':': '',
            '.': '',
            ',': '',
            ';': '',
            '–': '',
            '/': '',
            '\\': '',
            '?': '',
            '!': '',
            '@': '',
            '+': '',
            '#': '',
            '%': '',
            '&': '',
            '*': '',
            '„': '',
            '“': '',
            '"': '',
            '”': '',
            '\'': '',
            '$': '',
            '(': '',
            ')': ''
    };

    return {
        replaceSlug: function (text) {
            return text.replace(/[абвгдѓежзѕијклљмнњопрстќуфхцчџшАБВГДЃЕЖЗЦИЈКЛЉМНЊОПРСТЌУФХЦЧЏШABCDEIFGHIJKLMNOPQRSTUVWXYZ :.,;–/\\?!@+#%&$)(*„“]/g, function (s) {
                return !!alphabet[s] ? alphabet[s] : s;
            });
        }
    };

})();
