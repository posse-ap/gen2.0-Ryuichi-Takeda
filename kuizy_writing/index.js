'use strict'
//配列の定義
//先頭が正解
var question_list = new Array
question_list.push(["たかなわ", "こうわ", "たかわ"]),
question_list.push(["かめいど", "かめど", "かめと"]),
question_list.push(["こうじまち", "かゆまち", "おかとまち"]),
question_list.push(["おなりもん", "ごせいもん", "おかどもん"]),
question_list.push(["とどりき", "たたら", "たたりき"]),
question_list.push(["しゃくじい", "せきこうい", "いじい"]),
question_list.push(["ぞうしき", "ざっしき", "ざっしょく"]),
question_list.push(["おかちまち", "みとちょう", "ごしろちょう"]),
question_list.push(["ししぼね", "しこね", "ろっこつ"]),
question_list.push(["こぐれ", "こばく", "こしゃく"]),
question_list.push(["かめいど", "かめと", "かめど"])


//selection_id:問題番号
//selection:選択肢配列
//valid_id:正解番号
function createquestion(selection_id,selection,valid_id){ 
    var content = `<div>`
    + `<h1>${question_id}.この地名なんて読む？</h1>`
    + `<img src="img/img${question_id}.png">`


selection_list.forEach(function (selection,index){
    content += `<li>${selection}</li>`
})
}
// document.getElementById('wrap').innerHTML = content 


question_list.forEach(function(question, index){

    answer = question[0];

    for (var i = question.length - 1; i > 0; i--) {
        var r = Math.floor(Math.random() * (i + 1));
        var tmp = question[i];
        question[i] = question[r];
        question[r] = tmp;
    }

createquestion(index+1, question, question.indexOf(answer)+1)
})


