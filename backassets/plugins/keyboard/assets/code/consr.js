//  copyright lexilogos.com
var car;

function latcyr() {
car = document.transcription.text2.value;
car = car.replace(/h/g, "х");
car = car.replace(/j/g, "ј");
car = car.replace(/c/g, "ц");
car = car.replace(/a/g, "а");
car = car.replace(/b/g, "б");
car = car.replace(/v/g, "в");
car = car.replace(/g/g, "г");
car = car.replace(/d/g, "д");
car = car.replace(/e/g, "е");
car = car.replace(/д-/g, "ђ");
car = car.replace(/z/g, "з");
car = car.replace(/зх/g, "ж");
car = car.replace(/i/g, "и");
car = car.replace(/k/g, "к");
car = car.replace(/l/g, "л");
car = car.replace(/лј/g, "љ");
car = car.replace(/m/g, "м");
car = car.replace(/n/g, "н");
car = car.replace(/нј/g, "њ");
car = car.replace(/o/g, "о");
car = car.replace(/p/g, "п");
car = car.replace(/r/g, "р");
car = car.replace(/s/g, "с");
car = car.replace(/t/g, "т");
car = car.replace(/u/g, "у");
car = car.replace(/f/g, "ф");
car = car.replace(/đ/g, "ђ");
car = car.replace(/ž/g, "ж");
car = car.replace(/ć/g, "ћ");
car = car.replace(/č/g, "ч");
car = car.replace(/š/g, "ш");
car = car.replace(/цј/g, "ћ");
car = car.replace(/цх/g, "ч");
car = car.replace(/дж/g, "џ");
car = car.replace(/сх/g, "ш");
car = car.replace(/ц'/g, "ћ");
car = car.replace(/Đ/g, "Ђ");
car = car.replace(/Ž/g, "Ж");
car = car.replace(/Ć/g, "Ћ");
car = car.replace(/Č/g, "Ч");
car = car.replace(/Š/g, "Ш");
car = car.replace(/H/g, "Х");
car = car.replace(/J/g, "Ј");
car = car.replace(/C/g, "Ц");
car = car.replace(/A/g, "А");
car = car.replace(/B/g, "Б");
car = car.replace(/V/g, "В");
car = car.replace(/G/g, "Г");
car = car.replace(/D/g, "Д");
car = car.replace(/E/g, "Е");
car = car.replace(/Д-/g, "Ђ");
car = car.replace(/Z/g, "З");
car = car.replace(/I/g, "И");
car = car.replace(/K/g, "К");
car = car.replace(/L/g, "Л");
car = car.replace(/M/g, "М");
car = car.replace(/N/g, "Н");
car = car.replace(/O/g, "О");
car = car.replace(/P/g, "П");
car = car.replace(/R/g, "Р");
car = car.replace(/S/g, "С");
car = car.replace(/T/g, "Т");
car = car.replace(/Ц'/g, "Ћ");
car = car.replace(/U/g, "У");
car = car.replace(/F/g, "Ф");
car = car.replace(/ЗХ/g, "Ж");
car = car.replace(/ЛЈ/g, "Љ");
car = car.replace(/НЈ/g, "Њ");
car = car.replace(/ЦХ/g, "Ч");
car = car.replace(/ДЖ/g, "Џ");
car = car.replace(/СХ/g, "Ш");
car = car.replace(/ЦЈ/g, "Ћ");
car = car.replace(/Зх/g, "Ж");
car = car.replace(/Лј/g, "Љ");
car = car.replace(/Нј/g, "Њ");
car = car.replace(/Цх/g, "Ч");
car = car.replace(/Дж/g, "Џ");
car = car.replace(/Сх/g, "Ш");
car = car.replace(/Цј/g, "Ћ");
document.transcription.text1.value = car;
}

function cyrlat() {
car = document.transcription.text1.value;
car = car.replace(/а/g, "a");
car = car.replace(/б/g, "b");
car = car.replace(/в/g, "v");
car = car.replace(/г/g, "g");
car = car.replace(/д/g, "d");
car = car.replace(/е/g, "e");
car = car.replace(/ђ/g, "đ");
car = car.replace(/ж/g, "ž");
car = car.replace(/з/g, "z");
car = car.replace(/и/g, "i");
car = car.replace(/ј/g, "j");
car = car.replace(/к/g, "k");
car = car.replace(/л/g, "l");
car = car.replace(/љ/g, "lj");
car = car.replace(/м/g, "m");
car = car.replace(/н/g, "n");
car = car.replace(/њ/g, "nj");
car = car.replace(/о/g, "o");
car = car.replace(/п/g, "p");
car = car.replace(/р/g, "r");
car = car.replace(/с/g, "s");
car = car.replace(/т/g, "t");
car = car.replace(/ћ/g, "ć");
car = car.replace(/у/g, "u");
car = car.replace(/ф/g, "f");
car = car.replace(/х/g, "h");
car = car.replace(/ц/g, "c");
car = car.replace(/ч/g, "č");
car = car.replace(/џ/g, "dž");
car = car.replace(/ш/g, "š");
car = car.replace(/А/g, "A");
car = car.replace(/Б/g, "B");
car = car.replace(/В/g, "V");
car = car.replace(/Г/g, "G");
car = car.replace(/Д/g, "D");
car = car.replace(/Е/g, "E");
car = car.replace(/Ђ/g, "Đ");
car = car.replace(/Ж/g, "Ž");
car = car.replace(/З/g, "Z");
car = car.replace(/И/g, "I");
car = car.replace(/Ј/g, "J");
car = car.replace(/К/g, "K");
car = car.replace(/Л/g, "L");
car = car.replace(/Љ/g, "Lj");
car = car.replace(/М/g, "M");
car = car.replace(/Н/g, "N");
car = car.replace(/Њ/g, "Nj");
car = car.replace(/О/g, "O");
car = car.replace(/П/g, "P");
car = car.replace(/Р/g, "R");
car = car.replace(/С/g, "S");
car = car.replace(/Т/g, "T");
car = car.replace(/Ћ/g, "Ć");
car = car.replace(/У/g, "U");
car = car.replace(/Ф/g, "F");
car = car.replace(/Х/g, "H");
car = car.replace(/Ц/g, "C");
car = car.replace(/Ч/g, "Č");
car = car.replace(/Џ/g, "Dž");
car = car.replace(/Ш/g, "Š");
document.transcription.text2.value = car;
}
