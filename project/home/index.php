<?php
include 'header.php';
?>
  <div style="padding: 2.5% 0% 0% 0%;">
    <div class="slider">
      <!-- list Items -->
      <div class="list">
          <div class="item active">
              <img src="image/img1.png">
              <div class="content">
                  <p>gta+</p>
                  <h2 class="lists">gta V</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                  </p>
              </div>
          </div>
          <div class="item">
              <img src="image/img2.jpg">
              <div class="content">
                  <p >2077</p>
                  <h2 class="lists">Cyberpunk2077</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                  </p>
              </div>
          </div>
          <div class="item">
              <img src="image/img3.jpg">
              <div class="content">
                  <p>val</p>
                  <h2 class="lists"> Valhalla</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                  </p>
              </div>
          </div>
          <div class="item">
              <img src="image/img4.jpg">
              <div class="content">
                  <p>COD</p>
                  <h2 class="lists">COD</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                  </p>
              </div>
          </div>
          <div class="item">
              <img src="image/img5.jpg">
              <div class="content">
                  <p>MC</p>
                  <h2 class="lists">Mincraft</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                  </p>
              </div>
          </div>
      </div>
      <!-- button arrows -->
      <div class="arrows">
          <button id="prev"><</button>
          <button id="next">></button>
      </div>
      <!-- thumbnail -->
      <div class="thumbnail">
          <div class="item active">
              <img src="image/img1.png">
              <div class="content">
                  gtav
              </div>
          </div>
          <div class="item">
              <img src="image/img2.jpg">
              <div class="content">
                  cp2077
              </div>
          </div>
          <div class="item">
              <img src="image/img3.jpg">
              <div class="content">
                Valhalla
              </div>
          </div>
          <div class="item">
              <img src="image/img4.jpg">
              <div class="content">
                  COD
              </div>
          </div>
          <div class="item">
              <img src="image/img5.jpg">
              <div class="content">
                mincraft
              </div>
          </div>
      </div>
    </div>
  </div>
  <script>
        let items = document.querySelectorAll('.slider .list .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    let thumbnails = document.querySelectorAll('.thumbnail .item');

    // config param
    let countItem = items.length;
    let itemActive = 0;
    // event next click
    next.onclick = function(){
        itemActive = itemActive + 1;
        if(itemActive >= countItem){
            itemActive = 0;
        }
        showSlider();
    }
    //event prev click
    prev.onclick = function(){
        itemActive = itemActive - 1;
        if(itemActive < 0){
            itemActive = countItem - 1;
        }
        showSlider();
    }
    // auto run slider
    let refreshInterval = setInterval(() => {
        next.click();
    }, 5000)
    function showSlider(){
        // remove item active old
        let itemActiveOld = document.querySelector('.slider .list .item.active');
        let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
        itemActiveOld.classList.remove('active');
        thumbnailActiveOld.classList.remove('active');

        // active new item
        items[itemActive].classList.add('active');
        thumbnails[itemActive].classList.add('active');

        // clear auto time run slider
        clearInterval(refreshInterval);
        refreshInterval = setInterval(() => {
            next.click();
        }, 5000)
    }

    // click thumbnail
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            itemActive = index;
            showSlider();
        })
    })
  </script>

<?php    
include_once 'footer.php';