<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>六点半小说网</title>
    <link type="text/css" rel="stylesheet" href="{{asset('/read/css/basic.css')}}" >
    <div id="topOne">

    </div>
    <div id="Top">
        <div class="logo"><a href="#"><img src="/read/images/logo1.jpg" width="200px" height="50px"/></a></div>
        <div class="search">
            <form>
                <div id="searchTxt" class="searchTxt" >
                    <div class="searchMenu">

                        <div class="searchSelected" id="searchSelected">
                            <select name="cate">
                                <option value="">全部</option>
                                @foreach($cateinfo as $k=>$v)
                                    <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="display:none;" class="searchTab" id="searchTab">




                        </div>

                    </div>
                    <input name="search" type="text" />
                    <div class="searchBtn">
                        <button id="searchBtn" type="submit">搜索</button>
                    </div>
                </div>
            </form>

        </div>
        @if( session('tel') == '' )
        <div class="user">
            <font><a href="{{url('read/login')}}">登录&nbsp;&nbsp;&nbsp;|</a></font>
            <font><a href="{{url('read/reg')}}">注册</a></font>
            <a href="{{url('read/writer_area')}}">作家专区</a>
        </div>
        @else
            <div class="user">
                欢迎{{Session::get('tel')}}用户登录
                <a href="{{url('read/writer_area')}}">作家专区</a>
            </div>
        @endif
    </div>




    <div id="Logo" >
        <ul>
            <li class="first"><span class="iconfont">&#xe627;</span>全部小说分类</li>
            <li><a href="{{url('read/index')}}" title="首页">首页</a></li>
            @foreach($cateinfo as $k=>$v)
                <li><a href="javascript:;" cate_id="{{$v->cate_id}}" id="cate">{{$v->cate_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <!--主体-->

    <div id="Foucs">
        <div class="FoucsCommon">
            <div class="Menu">
                <ul>
                    <li>
                        <h3>都市小说</h3>
                        <p><a href="">狂少</a><a href="">校花的贴身高手</a></p>
                        <div class="moreNav"></div>
                        <div class="moreNav"></div>
                        <div class="border_top"></div>
                        <div class="border_bottom"></div>
                        <div class="border_right"></div>
                    </li>
                    <li>
                        <h3>玄幻小说</h3>
                        <p><a href="">魂帝武神</a><a href="">星辰变</a><a href="">归一</a></p>
                        <div class="moreNav"></div>
                        <div class="border_top"></div>
                        <div class="border_bottom"></div>
                        <div class="border_right"></div>

                    </li>
                    <li>
                        <h3>历史小说</h3>
                        <p><a href="">我的民国生涯</a><a href="">明朝那些事</a></p>
                        <div class="moreNav"></div>
                        <div class="border_top"></div>
                        <div class="border_bottom"></div>
                        <div class="border_right"></div>
                    </li>
                    <li>
                        <h3>军事小说</h3>
                        <p><a href="">一起扛过枪</a><a href="">不倒的军旗</a></p>
                        <div class="moreNav">
                        </div>
                        <div class="border_top"></div>
                        <div class="border_bottom"></div>
                        <div class="border_right"></div>
                    </li>
                    <li>
                        <h3>悬疑小说</h3>
                        <p><a href="">七宗罪</a><a href="">深夜书屋</a><a href="">虫屋</a></p>
                        <div class="moreNav"></div>
                        <div class="border_top"></div>
                        <div class="border_bottom"></div>
                        <div class="border_right"></div>
                    </li>
                    <li>
                        <h3>仙侠小说</h3>
                        <p><a href="">飞剑问道</a><a href="">三寸人间</a><a href="">道君</a></p>
                        <div class="moreNav"></div>
                        <div class="border_top"></div>
                        <div class="border_bottom"></div>
                        <div class="border_right"></div>
                    </li>
                </ul>
            </div>

            <div class="flash">
                <!--左右切换按扭-->
                <a href="javascript:void(0)" class="prev"></a>
                <a href="javascript:void(0)" class="next"></a>

                <!--图片滚动部分-->
                <div class="scroll">
                    @foreach($bookinfo as $k=>$v)
                        <img src="{{$v->book_file}}" book_id="{{$v->book_id}}" width="100%" height="100%" id="img"/>
                    @endforeach
                </div>

                <!--滚动按扭部分-->
                <div class="But">
                    <span class="hover"></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!--轮播图结束-->


            <div class="news">
                <div class="newsback"></div>
                <div class="newsCommon">
                    <!--746小说吧快讯 开始-->

                    <h3>小说快讯</h3>
                    <ul>
                        <li><a href="" class="first" title="魂帝武神"><font>[ 特刊 ]</font> 魂帝武神：双生子重新归来</a></li>
                        <li><a href="" title="归一"><font>[ 道者 ]</font>归一：大道无极</a></li>
                        <li><a href="" title="谋断九州"><font>[ 智者 ]</font> 谋定九州：武可开疆拓土，文可谋定江山</a></li>
                    </ul>
                    <!--746小说吧 结束-->
                    <div class="Datatx">
                        <h3>更新提醒</h3>
                        <ul>
                            <li><a href="" title="大国航海"><font>[ 更新 ]</font>大国航海：航母逞威大洋，潜艇鱼翔浅底 </a></li>
                            <li><a href="" title="746特刊"><font>[ 公告 ]</font>逆天邪神：掌天毒之珠，承邪神之血</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div></div>
    </div>
    <!--主体结束-->
    <div class="fenlei" >
        <p class="ti">作品分类</p>
        <div class="Part">

            <div class="PartL">

                <!--左右切换按扭-->
                <img src="images/prev.png" class="prev" />
                <img src="images/next.png" class="next" />


                <div class="imgList">
                    <ul>
                        <li>
                            <img src="images/hdws.jpg" width="280" height="280"/>
                            <h3>形意拳宗师萧逸魂穿异界,成就魂帝武神的强者之路粉碎天地，打破苍穹，凌驾诸天万界</h3>
                            <span>点击：<font>立即阅读</font></span>
                        </li>
                        <li>
                            <img src="images/ntxs.jpg" width="280" height="280"/>
                            <h3>掌天毒之珠，承邪神之血，修逆天之力，一代邪神，君临天下！</h3>
                            <span>点击：<font>立即阅读</font></span>
                        </li>
                        <li>
                            <img src="images/2849619-1530375219000.jpg" width="280" height="280"/>
                            <h3>谋能生乱，亦能止乱</h3>
                            <span>点击：<font>立即阅读</font></span>
                        </li>
                        <li>
                            <img src="images/ims.jpg" width="280" height="280"/>
                            <h3>迎风挥击千层浪，少年不败热血！</h3>
                            <span>点击：<font>立即阅读</font></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="PartM">
            <h3>月票榜</h3>

            @foreach($monthInfo as $k=>$v)
                    <li><a href="{{url('read/details/'.$v['book_id'])}}">{{$v['book_name']}}</a>{{$v['month_ticket']}}</li>
            @endforeach
            </div>
            <div class="PartR">
                <div class="infoBox">
                    <section class="book">
                        搜索排名前五的书籍
                        <ul>
                            @foreach($bookinfo as $k=>$v)
                            <li><a href="{{url('read/details/'.$v->book_id)}}"><img src="{{$v->book_file}}" width="150px" height="175px"></a>
                                <p>{{$v->book_name}}： <a href="{{url('read/details/'.$v->book_id)}}">点击阅读</a></p></li>
                            @endforeach
                        </ul>
                    </section>
                </div>



                <div class="secondInfo">
                    <section class="book">

                        <ul>
                            <li><img src="images/six_woman.jpg" width="150px" height="175px">
                                <p>千年回眸： <span>点击阅读</span></p></li>
                            <li><img src="images/one_woman.jpg" width="150px" height="175px">
                                <p>无极： <span>点击阅读</span></p></li>
                            <li><img src="images/two_woman.jpg" width="150px" height="175px">
                                <p>完美人生： <span>点击阅读</span></p></li>
                            <li><img src="images/three_woman.jpg" width="150px" height="175px">
                                <p>玉颜乱天下： <span>点击阅读</span></p></li>
                            <li><img src="images/four_woman.jpg" width="150px" height="175px">
                                <p>我用生命来爱： <span>点击阅读</span></p></li>
                            <li><img src="images/five_woman.jpg" width="150px" height="175px">
                                <p>妖艳王爷： <span>点击阅读</span></p></li>

                        </ul>
                    </section>

                </div>

                <div class="thirdInfo">
                    <section class="book">

                        <ul>
                            <li><img src="images/hdws.jpg" width="150px" height="175px">
                                <p>魂帝武神： <span>点击阅读</span></p></li>
                            <li><img src="images/191853ehbvpp17vopop5h7.jpg" width="150px" height="175px">
                                <p>龙血战神： <span>点击阅读</span></p></li>
                            <li><img src="images/2849619-1530375219000.jpg" width="150px" height="175px">
                                <p>归一： <span>点击阅读</span></p></li>
                            <li><img src="images/a.jpg" width="150px" height="175px">
                                <p>侠客无双： <span>点击阅读</span></p></li>
                            <li><img src="images/five.jpg" width="150px" height="175px">
                                <p>明月当歌： <span>点击阅读</span></p></li>
                            <li><img src="images/ims.jpg" width="150px" height="175px">
                                <p>万古第一帝： <span>点击阅读</span></p></li>

                        </ul>
                    </section>
                </div>


                <div class="fourInfo">
                    <section class="book">

                        <ul>
                            <li><img src="images/qianyue_one.jpg" width="150px" height="175px">
                                <p>潇潇雨歇： <span>点击阅读</span></p></li>
                            <li><img src="images/qianyue_two.jpg" width="150px" height="175px">
                                <p>海盗公敌： <span>点击阅读</span></p></li>
                            <li><img src="images/qianyue_three.jpg" width="150px" height="175px">
                                <p>戎马一生： <span>点击阅读</span></p></li>
                            <li><img src="images/qianyue_four.png" width="150px" height="175px">
                                <p>异域： <span>点击阅读</span></p></li>
                            <li><img src="images/qianyue_five.jpg" width="150px" height="175px">
                                <p>刺客信条： <span>点击阅读</span></p></li>
                            <li><img src="images/qianyue_six.jpeg" width="150px" height="175px">
                                <p>无证之罪： <span>点击阅读</span></p></li>

                        </ul>
                    </section>
                </div>


                <div class="lastInfo">
                    <section class="book">

                        <ul>
                            <li><img src="images/one_man.jpeg" width="150px" height="175px">
                                <p>仗剑天下： <span>点击阅读</span></p></li>
                            <li><img src="images/two_man.jpg" width="150px" height="175px">
                                <p>剑逆苍穹： <span>点击阅读</span></p></li>
                            <li><img src="images/three_man.jpg" width="150px" height="175px">
                                <p>将臣： <span>点击阅读</span></p></li>
                            <li><img src="images/four_man.png" width="150px" height="175px">
                                <p>星辰变： <span>点击阅读</span></p></li>
                            <li><img src="images/five_man.jpeg" width="150px" height="175px">
                                <p>紫川： <span>点击阅读</span></p></li>
                            <li><img src="images/six_man.jpg" width="150px" height="175px">
                                <p>我欲封天： <span>点击阅读</span></p></li>

                        </ul>
                    </section>
                </div>


            </div>
            <div style="clear:both"></div></div>

        <!--"/inc/fragment/6/3516.html" -->
        <div class="Footer">
            <div class="footer_nav">
                <a>关于六点半</a>&#12288;|&#12288;
                <a>商务合作</a>&#12288;|&#12288;
                <a>友情链接</a>&#12288;|&#12288;
                <a>帮助中心</a>&#12288;|&#12288;
                <a>用户守则</a>&#12288;|&#12288;
                <a>网站地图</a>&#12288;|&#12288;
                <a>诚聘精英</a>&#12288;|&#12288;
                <a>六点半开源</a>
            </div>
            <p><a>Copyright (C) 2018-2019 www.6dianban.com All Rights Reserved </a>
                <br />
                等在线小说阅读网站，未经许可不得擅自转载本站内容。
                6点半小说网所收录免费小说作品、社区话题、书友评论、用户上传文字、图片等其他一切内容均属用户个人行为，与6点半小说网无关。--6点半权利声明。
            </p>




            <!--引用外部jquery文件-->
            <script type="text/javascript" src="{{asset('/read/js/jquery-1.8.3.min.js')}}" ></script>
            <script type="text/javascript" src="{{asset('/read/js/index.js')}}" ></script>
            <script src="{{asset('/read/js/jquery.min.js')}}"></script>

            <script type="text/javascript">
                $(".faceul_zero img").hover(function(){
                    $(this).addClass("hoverstyle_zero");
                },function(){
                    $(this).removeClass("hoverstyle_zero");
                });
                $(".infoBox img").hover(function(){
                    $(this).addClass("hoverstyle_one");
                },function(){
                    $(this).removeClass("hoverstyle_one");
                });
                $("img.prev").click(function(){

                    $(".imgList ul").animate({"left":-280},500,function(){
                        $(this).append($(this).find("li:first"));
                        $(this).css("left",0);
                    });

                });

                $("img.next").click(function(){

                    autoPlay();

                });

                var cleartime=setInterval(autoPlay,2000);
                //鼠标放上去，停止播入
                $("img.next,img.prev").hover(function(){
                    clearInterval(cleartime);
                },function(){
                    cleartime=setInterval(autoPlay,3000);
                });

                function autoPlay(){

                    $(".imgList ul").prepend($(".imgList ul li:last"));
                    $(".imgList ul").css("left",-280);
                    $(".imgList ul").animate({"left":0},500);
                }
                //鼠标导航滑块跟随效果

                $(".PartM ul li:nth-of-type(n)").hover(function(){
                    $(".PartM ul li:nth-of-type(n)").css({"background":"#efefef","color":"#666"});
                    $(this).css({"width":"100%","background":"#00A1D2","border":"none"});
                });

                //图片选项卡
                $(function(){
                    $(".PartR>div").hide();
                    $(".PartR>div:eq(0)").show();

                    $(".PartM a").click(function(){
                        var n = $(".PartM a").index(this);
                        $(".PartM a").index(this);
                        $(".PartR>div").hide();
                        $(".PartR>div:eq("+n+")").show();
                    })


                })


                //下拉
                $(function(){

                    $("#searchSelected").click(function(){
                        $("#searchTab").show();
                        $(this).addClass("searchOpen");
                    });

                    $("#searchTab li").hover(function(){
                        $(this).addClass("selected");
                    },function(){
                        $(this).removeClass("selected");
                    });

                    $("#searchTab li").click(function(){
                        $("#searchSelected").html($(this).html());
                        $("#searchTab").hide();
                        $("#searchSelected").removeClass("searchOpen");
                    });

                });

                //图片缩放
                $(".book ul img").mouseenter(function(){
                    $(this).animate({width:"110%"},"slow");
                });
                $(".book ul img").mouseleave(function(){
                    $(this).animate({width:"80%"},"slow");
                });


                $(document).on('click','#cate',function(){
                    var cate_id = $(this).attr('cate_id');
                    location.href = 'http://1905read.lijiaxin.xyz/read/cate?cate_id='+cate_id;
                });

                $(document).on('click','#img',function(){
                    var book_id = $(this).attr('book_id');
                    location.href = 'http://1905read.lijiaxin.xyz/read/details/'+book_id;
                });

            </script>

            </body>
</html>
