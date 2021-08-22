'use strict'

const choices = [
    ["たかなわ", "こうわ", "たかわ"],
    ["かめいど", "かめど", "かめと"],
    ["こうじまち", "かゆまち", "おかとまち"],
    ["おなりもん", "ごせいもん", "おかどもん"],
    ["とどりき", "たたら", "たたりき"],
    ["しゃくじい", "せきこうい", "いじい"],
    ["ぞうしき", "ざっしき", "ざっしょく"],
    ["おかちまち", "みとちょう", "ごしろちょう"],
    ["ししぼね", "しこね", "ろっこつ"],
    ["こぐれ", "こばく", "こしゃく"],
    ["かめいど", "かめと", "かめど"],
];

const images = [
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png", "高輪"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png", "亀戸"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png", "麹町"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png", "御成門"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png", "等々力"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png", "石神井"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png", "雑色"],
    ["https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png", "御徒町"],
    ["https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png", "鹿骨"],
    ["https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png", "小榑"],
];
const shuffle = ([...array]) => {
  for (let k = array.length - 1; k >= 0; k--) {
    const j = Math.floor(Math.random() * (k + 1));
    [array[k], array[j]] = [array[j], array[k]];
  }
  return array;
};
const array = [0, 1, 2];
 
const random = shuffle(array);
const random0= random[0];
const random1= random[1];
const random2= random[2];

for (let i = 0; i < images.length; i++) {
    let quizySet =
        `<div class = container>`
        + `<h1 class="question">${i + 1}.この地名はなんて読む？</h1>`
        + `</div>`
        + `<img src = ${images[i][0]} alt = ${images[i][1]} class="image">`
        + `<li class="choice" id = "choice${i}-${random[0]}">${choices[i][random[0]]}</li>`
        + `<li class="choice" id = "choice${i}-${random[1]}">${choices[i][random[1]]}</li>`
        + `<li class="choice" id = "choice${i}-${random[2]}">${choices[i][random[2]]}</li>`
        + `<div class="resultBox" id="correctResultBox${i}">`
        + `<p  class = "correct" id="correct${i}" >正解！</p>`
        + `<p>正解は「${choices[i][0]}」です！</p>`
        + `</div>`
        + `<div class="resultBox" id="incorrectResultBox${i}">`
        + `<p  class = "incorrect" id="incorrect${i}">不正解！</p>`
        + `<p>正解は「${choices[i][0]}」です！</p>`
        + `</div>`
    document.write(quizySet);

    document.getElementById(`choice${i}-0`).addEventListener('click', () => {
        document.getElementById(`choice${i}-0`).style.background = 'blue';
        document.getElementById(`choice${i}-0`).style.color = 'white';
        document.getElementById(`correctResultBox${i}`).style.display = "block";
        document.getElementById(`correct${i}`).style.display = "block";
        document.getElementById(`choice${i}-1`).classList.add("click-block");
        document.getElementById(`choice${i}-2`).classList.add("click-block");
    })
    document.getElementById(`choice${i}-1`).addEventListener('click', () => {
        document.getElementById(`choice${i}-0`).style.background = 'blue';
        document.getElementById(`choice${i}-0`).style.color = 'white';
        document.getElementById(`incorrectResultBox${i}`).style.display = "block";
        document.getElementById(`incorrect${i}`).style.display = "block";
        document.getElementById(`choice${i}-1`).style.background = 'red';
        document.getElementById(`choice${i}-1`).style.color = 'white';
        document.getElementById(`choice${i}-0`).classList.add("click-block");
        document.getElementById(`choice${i}-2`).classList.add("click-block");
    })
    document.getElementById(`choice${i}-2`).addEventListener('click', () => {
        document.getElementById(`choice${i}-0`).style.background = 'blue';
        document.getElementById(`choice${i}-0`).style.color = 'white';
        document.getElementById(`incorrectResultBox${i}`).style.display = "block";
        document.getElementById(`incorrect${i}`).style.display = "block";
        document.getElementById(`choice${i}-2`).style.background = 'red';
        document.getElementById(`choice${i}-2`).style.color = 'white';
        document.getElementById(`choice${i}-0`).classList.add("click-block");
        document.getElementById(`choice${1}-1`).classList.add("click-block");
    })
}














