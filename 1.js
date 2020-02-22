// 12:00:00 - 10:25:21 = 1 Jam, 34 Menit, 39 Detik
// 1 Jam = 60 x 60s = 3600s
// 34 Menit = 34 x 60s = 2040s
// 3600s + 2040s + 39s = 5679s

// Kecepatan awal 6m/s,  11 menit (660s) pertama naik 1m/s, 10 menit (600s) kemudian naik 1m/s dst
// Tiap 600s naik 1m/s

// setelah 11 menit pertama jarak tempuh = 660 x 6 = 3960s
// kemudian setiap 10 menit (600s) 

let kecepatanAwal = 6;
let jarakTempuh = 0;
let waktuTempuh = 5679;

// 11 Menit Awal
let sebelasMenitSeconds = 660;
let sisaWaktu = waktuTempuh - sebelasMenitSeconds;
while (sebelasMenitSeconds !== 0) {
  jarakTempuh += 6;
  sebelasMenitSeconds--;
}

let kecepatanSekarang = kecepatanAwal + 1;

// console.log(`sisa waktu = ${sisaWaktu}`);

// Lacak tiap 600 s (10 Menit), naik 1 m/s
let lacakWaktu = 0;
while (sisaWaktu !== 0) {
  if (lacakWaktu == 600) {
    kecepatanSekarang++;
    lacakWaktu = 0;
  }
  
  jarakTempuh += kecepatanSekarang;
  lacakWaktu++;
  sisaWaktu--;
}


console.log(`Jarak Tempuh = ${jarakTempuh} Meter`);