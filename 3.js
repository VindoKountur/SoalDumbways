const buatGambar = (angka) => {
  let str = '';
  if (angka % 2 === 0) {
    let satu = Math.round(angka / 2);
    let lacak = satu;
    let dua = Math.round(angka / 2);
    dua++;
    for (let i = 0; i < angka; i++) {
      for (let j = 0; j < angka; j++) {
        if ((j + 1 == satu) || (j + 1 == dua)) {
          str += '*';
        } else {
          str += ' ';
        }
      }
      if (lacak == 1) {
        lacak--;
      } else if (lacak <= 1) {
        lacak--;
        satu++;
        dua--;
      } else {
        lacak--;
        satu--;
        dua++;
      }
      console.log(str);
      str = '';
    }
  } else {
    let satu = Math.round(angka / 2);
    let lacak = satu;
    let dua = Math.round(angka / 2);
    for (let i = 0; i < angka; i++) {
      for (let j = 0; j < angka; j++) {
        if ((j + 1 == satu) || (j + 1 == dua)) {
          str += '*';
        } else {
          str += ' ';
        }
      }
      if (lacak <= 1) {
        lacak--;
        satu++;
        dua--;
      } else {
        lacak--;
        satu--;
        dua++;
      }
      console.log(str);
      str = '';
    }
  }
}
let angka = 8;
buatGambar(angka);
