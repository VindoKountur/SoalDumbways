const data_sorting = (arr) =>{
  data.sort(function(a, b){
    return a.length - b.length;
  });
  data.forEach(element => {
    element.sort();
  });
}


let data = [
  ['g','h','i','j'],
  ['a','c','b','e','d'],
  ['g','e','f']
];

data_sorting(data);

console.log(data);