<?php include_once "./base.php"; ?>
<?php include_once "common/common.php";?>
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>線上履歷表</title>
  
  <link rel="stylesheet" href="plugins/bootstrap.min.css">
  <script src="plugins/bootstrap.bundle.min.js"></script>
  <script src="plugins/jquery-3.6.0.min.js"></script>
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="plugins/custom.css">
  <!-- aos.js -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- css -->
  <style></style>

</head>
<body>
  <!-- 個人資訊 -->
  <?php
    $infor = $Infor->find(['name'=>'傅馨儀']);
    $avatar = $Image->find(['sh'=>1,'sort'=>1]);
    $background = $Image->find(['sh'=>1,'sort'=>2]);
    // dd($infor);
  ?>
  <!-- 背景圖片 -->
  <section id="myInformation" class="bg-img py-5" style="background-image: url(img/<?=$background["img"]?>);">
    <div class="login">
      <?php if(isset($_SESSION['user'])): ?>
        <a href="backend.php" class="btn btn-success me-2">回到後台</a>
        <a href="logout.php" class="btn btn-success">登出</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-success">登入</a>
      <?php endif; ?>
    </div>
    <div class="container">
      <div class="row p-5 mx-3 text-white" style="background: rgba(50, 50, 50, 0.5); border-radius: 10px;">
        <div class="col-12 col-md-4 col-lg-3 text-center border d-flex justify-content-center align-items-center">
          <div class="text-nowrap">
            <!-- 大頭照 -->
            <div class="photo mt-3" style="background-image:url(./img/<?=$avatar["img"]?>);"></div>
            <!-- 姓名 -->
            <p class="fs-3 f-sp mb-0 mt-3"><?=$infor["name"]?></p>
            <p><?=$infor["en_name"]?></p>
          </div>
        </div>
        <!-- 基本資訊 -->
        <div class="col-12  col-md-8 col-lg-9">
          <div class="col-12 pt-3 border-bottom">
            <!-- 個資 -->
            <p class="row">
              <span class="col me-4">生日：<?=$infor["brithday"]?></span>
              <span class="col me-4">歲數：<?=$infor["years_old"]?>歲</span>
            </p>
            <!-- 聯絡 -->
            <p class="row">
              <span class="col me-4">信箱：<?=$infor["mail"]?></span>
              <span class="col me-4">電話：<?=$infor["tel"]?></span>
            </p>
            <p class="row justify-content-center justify-content-md-start">
              <a href='<?=$infor["github"]?>' target="_blank" class="col" style="flex-grow: 0;"><i class="fab fa-github fa-fw text-white" ></i></a>
              <a href='<?=$infor["codepen"]?>' target="_blank" class="col" style="flex-grow: 0;"><i class="fab fa-codepen fa-fw text-white"></i></a>
              <a href='<?=$infor["facebook"]?>' target="_blank" class="col" style="flex-grow: 0;"><i class="fab fa-facebook fa-fw text-white"></i></i></a>
            </p>
          </div>
          <!-- 自傳區 -->
          <?php $autobio = $Autobio->all(['sh'=>1]);
          // dd($autobio);
          foreach($autobio as $value):
          ?>
          <div class="col-12 pt-3">
            <h5>自傳</h5>
            <p class="mb-0" style="text-indent: 2rem;"><?=$value["text"]?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- 導覽列區 -->
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="box-shadow: 0 3px 8px 1px rgba(30,30,50,0.4);">
    <div class="container justify-content-end">
      <!-- 漢堡 -->
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- 選單連結 -->
      <div class="collapse navbar-collapse mt-3 mt-md-0" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0 text-end px-1">
          <?php
            $condSh = $Sh->find(['section'=>'求職目標']);
            if($condSh['sh'] == 1):
          ?>
          <li class="nav-item mx-2">
            <a class="nav-link active fw-bold" href="#myDesired">求職目標</a>
          </li>
          <?php endif; ?>
          <?php
            $skillSh = $Sh->find(['section'=>'專業技能']);
            if($skillSh['sh'] == 1):
          ?>
          <li class="nav-item mx-2">
            <a class="nav-link fw-bold" href="#mySkills">專業技能</a>
          </li>
          <?php endif; ?>
          <?php
            $wxperSh = $Sh->find(['section'=>'學歷經歷']);
            if($wxperSh['sh'] == 1):
          ?>
          <li class="nav-item mx-2">
            <a class="nav-link fw-bold" href="#myWxperioence">學歷經歷</a>
          </li>
          <?php endif; ?>
          <?php
            $portSh = $Sh->find(['section'=>'作品集']);
            if($portSh['sh'] == 1):
          ?>
          <li class="nav-item mx-2">
            <a class="nav-link fw-bold" href="#myPortfolio">作品集</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
  </nav>
  <!-- 求職目標 -->
  <?php if($condSh['sh'] == 1):?>
  <section id="myDesired" class="container mt-5">
    <h3 class="mb-5">求職目標</h3>
    <?php $cond = $Cond->all();
    // dd($cond);
    foreach($cond as $value):
    ?>
    <div class="row">
      <!-- 求職條件 -->
      <div class="col-12 col-md-6 px-4 mb-sm-4">
        <h5 class="fw-bold mb-3" style="font-size:1.4rem;">求職條件</h5><hr>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 可上班日</div><div class="col-8"><?=$value["day"]?></div></div>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 上班時段</div><div class="col-8"><?=$allTime[$value["time"]-1]?></div></div>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 希望薪資</div><div class="col-8"><?=$value["money"]?>元</div></div>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 希望地點</div><div class="col-8"><?=$value["area"]?></div></div>
      </div>
      <!-- 工作描述 -->
      <div class="col-12 col-md-6 px-4">
        <h5 class="fw-bold mb-3" style="font-size:1.4rem;">工作描述</h5><hr>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 希望職務</div><div class="col-8"><?=$value["job"]?></div></div>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 工作性質</div><div class="col-8"><?=$allNature[$value["nature"]-1]?></div></div>
        <div class="row px-3 mb-2" style="font-size:1.2rem;"><div class="col-3 text-cadark fw-bolder me-3 text-nowrap">· 工作內容</div><div class="col-8"><?=$value["content"]?></div></div>
      </div>
    </div>
    <?php endforeach; ?>
  </section>
  <?php endif; ?>
  <!-- 專業技能 -->
  <?php if($skillSh['sh'] == 1): ?>
  <section id="mySkills" class="container mt-5">
    <h3 class="mb-5">專業技能</h3>
    <div class="row">
      <!-- 網頁開發 -->
      <div class="col-12 col-md-6 px-4 pb-3 mb-sm-4">
        <!-- 技能種類 -->
        <h5 class="fw-bold mb-2" style="font-size:1.4rem;">網頁開發</h5>
        <!-- 技能 -->
        <?php $skills = $Skills->all(['sh'=>1,'sort'=>1]);
        // dd($skills);
        foreach($skills as $value):
        ?>
        <P class="mb-0 text-muted"><?=$value['skill']?></P>
        <div class="row align-items-center px-2 mb-1">
          <div class="progress col-11 p-0" style="height: 0.8rem">
            <div class="progress-bar bg-cadark" role="progressbar" value="<?=$value['perc']?>" style="width:0%"></div>
          </div><div class="col-1 text-muted"><?=$value['perc']?>%</div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- 影像編修 -->
      <div class="col-12 col-md-6 px-4 pb-3">
        <!-- 技能種類 -->
        <h5 class="fw-bold mb-2" style="font-size:1.4rem;">影像編修</h5>
        <!-- 技能 -->
        <?php $skills = $Skills->all(['sh'=>1,'sort'=>2]);
        // dd($skills);
        foreach($skills as $value):
        ?>
        <P class="mb-0 text-muted"><?=$value['skill']?></P>
        <div class="row align-items-center px-2 mb-1">
          <div class="progress col-11 p-0" style="height: 0.8rem">
            <div class="progress-bar bg-cadark" role="progressbar" value="<?=$value['perc']?>" style="width:0%"></div>
          </div><div class="col-1 text-muted"><?=$value['perc']?>%</div>
        </div>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <!-- 學歷經歷 -->
  <?php if($wxperSh['sh'] == 1): ?>
  <section id="myWxperioence" class="container mt-5">
    <h3 class="mb-5">學歷經歷</h3>
    <div class="row flex-lg-column">
      <?php $wxper = $Wxper->all(['sh'=>1], " order by rank desc");
      // dd($wxper);
      $conut = count($wxper);
      foreach($wxper as $value):
      ?>
        <div class="col-12 col-lg-6 px-4">
          <div class="time">
            <h5 class="fw-bold mb-1" style="font-size:1.4rem;"><?=$value["name"]?></h5>
            <p class="fw-bold mb-3 d-inline-block" style="font-size:1.2rem;"><?=$value["title"]?></p>
            <p class="fs-6 ms-2 mb-3 d-inline-block" style="color:#aaa;">( <?=$value["date_start"] . "-" . $value["date_end"]?> )</p>
            <p class="mb-0"><?=$value["text"]?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>
  <!-- 作品集 -->
  <?php if($portSh['sh'] == 1): ?>
  <section id="myPortfolio" class="container mt-5"  style="min-height: 100vh;">
    <h3 class="mb-5">作品集</h3>
    <!-- 按鈕 -->
    <ul class="nav nav-pills mb-5 bg-wh">
      <li class="nav-item">
        <a class="active mx-3 fs-5 fw-bold" data-bs-toggle="pill" href="#por_code">網頁開發</a>
      </li>
      <span class="fs-5" style="color:#ccc;">|</span>
      <li class="nav-item">
        <a class="mx-3 fs-5 fw-bold" data-bs-toggle="pill" href="#por_design">影像編修</a>
      </li>
    </ul>
    <!-- 內容 -->
    <div class="tab-content">
      <!-- 頁籤一 -->
      <div id="por_code" class="row row-cols-2 mb-3 tab-pane fade show active">
        <?php $port = $Port->all(['sh'=>1,'sort'=>1]);
        // dd($port);
        foreach($port as $value):
        ?>
        <!-- 作品 -->
        <div class="portcard col-12 col-sm-6 col-md-4 col-lg-3 p-2" data-aos="zoom-in" data-aos-delay="200">
          <div class="card" style="overflow: hidden;box-shadow: 0 2px 15px 0 #ddd;">
            <!-- 連結 -->
            <a href='<?=$value["href"]?>' target="_blank" class="mask">
              <!-- 圖片 -->
              <img src='img/<?=$value["img"]?>' class="card-img-top img">
              <h5>前往網頁</h5>
              <i class="fas fa-link"></i>
            </a href='<?=$value["href"]?>'>
            <!-- 內容 -->
            <div class="card-body">
              <h5 class="card-title fw-bold m-0"><?=$value["title"]?></h5>
              <p class="card-text" style="color:#aaa;"><?=$value["text"]?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- 頁籤二 -->
      <div id="por_design" class="row row-cols-2 mb-3 tab-pane fade">
      <?php $port = $Port->all(['sh'=>1,'sort'=>2]);
        // dd($port);
        foreach($port as $value):
        ?>
        <!-- 作品 -->
        <div class="portcard col-12 col-sm-6 col-md-4 col-lg-3 p-2" data-aos="zoom-in" data-aos-delay="200">
          <div class="card" style="overflow: hidden;box-shadow: 0 2px 15px 0 #ddd;">
            <!-- 連結 -->
            <a href='<?=$value["href"]?>' target="_blank" class="mask">
              <!-- 圖片 -->
              <img src='img/<?=$value["img"]?>' class="card-img-top img">
              <h5>前往網頁</h5>
              <i class="fas fa-link"></i>
            </a href='<?=$value["href"]?>'>
            <!-- 內容 -->
            <div class="card-body">
              <h5 class="card-title fw-bold m-0"><?=$value["title"]?></h5>
              <p class="card-text" style="color:#aaa;"><?=$value["text"]?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <!-- 頁腳 -->
  <footer class="mt-5 w-100 bg-cad text-center p-3 text-white">
    <a id="arr" href="#top">
      <i class="fas fa-arrow-up"></i>
    </a>
    <p class="mb-1">© Copyright 2021. All Rights Reserved</p>
    <p class="mb-0">Designed by FU, XIN-YI</p>
  </footer>

</body>
</html>

<script>
  // 作品集hover效果
  $("a.mask").hover(function(){
    $(this).find(".img").toggleClass("img_hover");
    $(this).find(".fa-link").toggleClass("fa-link_hover");
    $(this).find("h5").toggleClass("h5_hover");
  })

  // 添加active
  const active = function(){
    const nowHeight = $(window).scrollTop();
    $("section").each((i,e) => {
      // console.log(e);
    const
      id = $(e).attr("id"),
      section = $(e).offset().top - $(".navbar").innerHeight() - 31,
      height = $(e).innerHeight();

      if(section < nowHeight &&  nowHeight < (section+height)){
        $("#navbarSupportedContent a").removeClass("active");
        $(`#navbarSupportedContent a[href='#${id}']`).addClass("active");
      }
    })
  }

  // 連結偏移 & 添加active
  $("#navbarSupportedContent a").on("click",function(){
    const 
      who = $(this).attr("href"),
      target = $(who).offset().top - $(".navbar").innerHeight() - 30;
      
    $("html").animate({scrollTop:target},800);

    active();
  })

  // 計量條動畫
  const meteringStrip = () => {
    let skillCount = $(".progress-bar").length;
    // console.log(skillCount);

    for(let i =0; i<skillCount; i++){
      let val = document.getElementsByClassName("progress-bar")[i].getAttribute('value');
      document.getElementsByClassName("progress-bar")[i].style=`width:${val}%`;
    }
  }

  // 學歷經歷 row 高變化
  const wxperH = () => {
    let wxperRowH = $("#myWxperioence .row").innerHeight();

    $("style").html(`
    @media (min-width: 992px){
      .flex-lg-column {
          height: ${wxperRowH/2+50}px;
      }
    }
    `);
  }
  wxperH();

  // 畫面滾動
  $(window).scroll(function(){
    active();
    const
      now = $(window).scrollTop(),
      top = $("#myInformation").innerHeight() + $(".navbar").innerHeight() + 100;
    if(now > top){
      meteringStrip();
    }
  })

  AOS.init(
    );
</script>