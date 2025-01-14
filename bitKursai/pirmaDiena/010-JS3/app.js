// function getBad():Boolean { - ne typescript neveikia tokie dalykai
//     let jonas = 5;
//     let petras = 5;
//     return jonas == petras ;
// }

console.log('Labas, Marseli!')

let fobas = 1;

let fobas2 = 2;

fobas = fobas + 1;

fobas += 7;

fobas = fobas % 3; // gaunasi 9 - 7 = 2, liekana skaiciuoja - dalyba su liekana

console.log(fobas);

console.log(6 % 3);


for (deimas = 0; deimas <= 3; deimas++)

    deimas++; // padidina vienetu

console.log(++deimas); // output : 5

let deimas4 = 3;
let deimas5 = 3;
let deimas6 = 3;

let kiek1 = deimas4++ * 2;
let kiek2 = ++deimas5 * 2;


console.log(kiek1);
console.log(kiek2);
console.log(deimas6++ * ++deimas6); //output 15 DIDINIMAS VYKSTA PO SUPLANUOTO VEIKSMO
console.log(fobas2 ** fobas2); //Kelimas laipsniu
console.log(8 / 3);
console.clear(); //isvalo konsole
console.log(Math.round(7.35)); // apvalina iki sveiko skaiciaus
console.log(Math.ceil(7.15));// bus 8 nes i didziaja puse
console.log(Math.floor(7.99));// bus 7 nes i mazaja puse
console.log(Math.sqrt(81)); //bus 9, kvad saknis

console.log(Math.max(5, 100, 15, -30, 28)); //didziausas skaciu paema is saraso.
console.log(Math.min(5, 100, 15, -30, 28)); //maziausias skaciu paema is saraso.

let deimas8 = 3;
let deimas9 = 5;

console.log(deimas8 + parseInt(deimas9)); //praseInt pakeicia string i skaiciu, parseFloat pavercia i skaiciu su kableliu jeigu to reikia

let deimas10 = '3.5';

console.log(parseFloat(deimas10) + 7);

let deimas11 = '69ABC'; // string, bet jei butu ABC52 tada jis tiesiog ismes NaN

console.log(parseInt(deimas11)) // bus tik 69, abc dings.

let deimas12 = '420';

deimas12 = +deimas12; // pakeicia i skaiciu tik tada kada stringe tik skaiciai
console.log(deimas12);

let deimas16 = 333;
console.log(deimas16 + '');

let deimas17 = 'ABC52';
console.log(deimas17.replace(/[^0-9]/g, ''))
//use regex tp remove all non-numeric characters


const a = 10;
const b = 7;
const c = 19;

console.log(a < b); // output false 

if (a > b && a + b == c) {
    console.log('a daugiau uz b ir suma lygi c');
} else {
    console.log('netiesa');
}

console.log('a' < 'b'); // https://www.asciitable.com/  ir mes lyginam ju DEC 
console.log('AA' > 'A'); // ju reiksme kaip skaciu vienoda nes pagal JS 65, 65 > 65, 0 . Nes lygina po viena simboli, prieda antram 65 dar viena skaiciu kuris yar 0

// niekada nelyginkit skirtingu tipu values
/*
    > / daugiau
    < / maziau
    == / lygu
    != / nelygy
    >= / daugiau arba lygu
    <= / maziau arba lygu
    === / grieztai lygu
    !==/ grieztai nelygu

    //Kas tas grieztai ? yra strict types tai jei vienas bus string kitas skaicius ir gausi false
    */

