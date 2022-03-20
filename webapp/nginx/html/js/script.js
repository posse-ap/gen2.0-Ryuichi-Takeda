'use strict'
const calendar_container_content =  document.getElementById('calendar_container_content');
const modal_contents =  document.getElementById('modal_contents');
const modal_wrapper =  document.getElementById('modal_wrapper');
const report_and_posting2_container =  document.getElementById('report_and_posting2_container');
const spinner_box =  document.getElementById('spinner_box');
const circle12 =  document.getElementById('circle12');
const done =  document.getElementById('done');

spinner_box.classList.add('none');
done.classList.add('none');

function tweet(){
    if(circle12.classList.contains('blue') == true ){
    var textarea = document.getElementById("textarea");
    console.log(textarea.value);
    window.open("https://twitter.com/intent/tweet?text=" + textarea.value);
}else{

}
    spinner_box.classList.add('none');
    done.classList.remove('none');
}

function click(){
    modal_wrapper.classList.add('center');
    setTimeout(tweet, 3000);
}

report_and_posting2_container.addEventListener('click',function (){
    click();
});

report_and_posting2_container.addEventListener('click', ()=>{
modal_contents.classList.add('none');
spinner_box.classList.remove('none');
report_and_posting2_container.classList.add('none');
});


//カレンダー
var study_day_record = document.getElementById('study_day_record');
var fp = flatpickr(study_day_record, {
    enableTime: true,
    dateFormat: "Y-m-d",// フォーマットの変更
});

for(let i = 1; i < 13; i++){
document.getElementById(`circle${i}`).addEventListener('click', ()=>{
    document.getElementById(`circle${i}`).classList.toggle('blue')
})}






















// modal_content.classList.add= 'none'
// c


// var contents=

// '<table class="calendar">'
//             '<tr>'
//   +          '<th>SUN</th>'
//   +          '<th>MON</th>'
//   +          '<th>TUE</th>'
//   +          '<th>WED</th>'
//   +          '<th>THU</th>'
//   +          '<th>FRI</th>'
//   +          '<th>SAT</th>'
//   +          '</tr>'


//   document.getElementById('calendar').insertAdjacentHTML('afterbegin', contents);
        //     <tr class="day">
        //       <td></td>
        //       <td></td>
        //       <td></td>
        //       <td></td>
        //       <td>1</td>
        //       <td>2</td>
        //       <td>3</td>
        //     </tr>
        //     <tr class="day">
        //       <td>4</td>
        //       <td>5</td>
        //       <td>6</td>
        //       <td>7</td>
        //       <td>8</td>
        //       <td>9</td>
        //       <td>10</td>
        //     </tr>
        //     <tr class="day">
        //       <td>11</td>
        //       <td>12</td>
        //       <td>13</td>
        //       <td>14</td>
        //       <td>15</td>
        //       <td>16</td>
        //       <td>17</td>
        //     </tr>
        //     <tr class="day">
        //       <td>18</td>
        //       <td>19</td>
        //       <td>20</td>
        //       <td>21</td>
        //       <td>22</td>
        //       <td>23</td>
        //       <td>24</td>
        //     </tr>
        //     <tr class="day">
        //       <td>25</td>
        //       <td>26</td>
        //       <td>27</td>
        //       <td>28</td>
        //       <td>29</td>
        //       <td>30</td>
        //       <td>31</td>
        //     </tr>
        //   </table>



