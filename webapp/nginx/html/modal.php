<div class="modal" id="modal">
    <a href="#!" class="overlay"></a>
    <div class="modal-wrapper" id="modal_wrapper">
        <a href="#!" class="modal-close">✕</a>
        <div id="spinner_box">
            <main class="wrapper">
                <section class="container" id="spinner_box">
                    <div class="loader-1"></div>
                </section>
        </div>
        <div class="done" id='done'>
            <div class="awesome">AWESOME!
            </div>
            <div class="done_circle">
                <div type="checkbox" class="done_checkbottun" name="study_content"></div>
            </div>
            <div class="done_text">記録・投稿</div>
            <!-- <br> -->
            <div>完了しました</div>
        </div>
        <div class="modal-contents" id="modal_contents">
            <a href="#!" class="modal-close">✕</a>
            <div class="modal_left">
                <h1>学習日</h1>
                <input class="study_day_record" id="study_day_record" type="text"></input>
                <h1>学習コンテンツ(複数選択可)</h1>
                <div class="study_content_check_container">
                    <div class="study_content_check_box">
                        <div class="circle" id="circle1">
                            <div type="checkbox" class="checkbottun" id="checkbottun1" name="study_content" value="N予備校"></div>
                        </div>
                        <div class="checkbottun_text">N予備校</div>
                    </div>
                    <div class="study_content_check_box">
                        <div class="circle" id="circle2">
                            <div type="checkbox" class="checkbottun" id="checkbottun2" name="study_content" value="ドットインストール"></div>
                        </div>
                        <div class="checkbottun_text">ドットインストール</div>
                    </div>
                    <div class="study_content_check_box">
                        <div class="circle" id="circle3">
                            <div type="checkbox" class="checkbottun" id="checkbottun3" name="study_content" value="POSSE課題"></div>
                        </div>
                        <div class="checkbottun_text">POSSE課題</div>
                    </div>
                </div>
                <h1>学習言語(複数選択可)</h1>
                <div class="study_language_check_container">
                    <div class="study_language_check_box">
                        <div class="circle" id="circle4">
                            <div type="checkbox" class="checkbottun" id="checkbottun4" name="study_language" value="HTML"></div>
                        </div>
                        <div class="checkbottun_text">HTML</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle5">
                            <div type="checkbox" class="checkbottun" id="checkbottun5" name="study_language" value="CSS"></div>
                        </div>
                        <div class="checkbottun_text">CSS</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle6">
                            <div type="checkbox" class="checkbottun" id="checkbottun6" name="study_language" value="JavaScript"></div>
                        </div>
                        <div class="checkbottun_text">JavaScript</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle7">
                            <div type="checkbox" class="checkbottun" id="checkbottun7" name="study_language" value="PHP"></div>
                        </div>
                        <div class="checkbottun_text">PHP</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle8">
                            <div type="checkbox" class="checkbottun" id="checkbottun8" name="study_language" value="Laravel"></div>
                        </div>
                        <div class="checkbottun_text">Laravel</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle9">
                            <div type="checkbox" class="checkbottun" id="checkbottun9" name="study_language" value="SQL"></div>
                        </div>
                        <div class="checkbottun_text">SQL</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle10">
                            <div type="checkbox" class="checkbottun" id="checkbottun10" name="study_language" value="SHELL"></div>
                        </div>
                        <div class="checkbottun_text">SHELL</div>
                    </div>
                    <div class="study_language_check_box">
                        <div class="circle" id="circle11">
                            <div type="checkbox" class="checkbottun" id="checkbottun11" name="study_language" value="情報システム基礎知識(その他)"></div>
                        </div>
                        <div class="checkbottun_text">情報システム基礎知識(その他)</div>
                    </div>
                </div>
            </div>

            <div class="modal_right">
                <h1>学習時間</h1>
                <div class="study_hour_record"></div>

                <h1>Twitter用コメント</h1>
                <div class="text_area_container">
                    <textarea name="" class="textarea" id="textarea" cols="30" rows="9"></textarea>
                </div>
                <div class="Tweet_check_container">
                    <div class="Twitter_share_box">
                        <div class="circle" id="circle12">
                            <div type="checkbox" class="checkbottun" id="checkbottun12" name="Twitter_share" value="Twitterにシェアする"></div>
                        </div>
                        <div class="checkbottun_text">Twitterにシェアする</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="report_and_posting2_container" id="report_and_posting2_container" onclick="click">
            <div class="report_and_posting2">記録・投稿</div>
        </div>
    </div>
</div>