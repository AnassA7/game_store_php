<div class="menu-nav">

        <div class="dropdown-container" tabindex="-1">
          <div class="three-dots"></div>
          <div class="dropdown">
            <a href="#"><div>Reste</div></a>
            <a href="#"><div>information</div></a>
            <a href="#"><div>walo</div></a>
          </div>
        </div>
      </div>

<style>
.menu-nav {
        display: flex;
        justify-content: space-between;
        background-color: none;
        }
      
      .menu-item {
        color: #FCC;
        padding: 30px;
      }
      
      .three-dots:after {
        cursor: pointer;
        color: #444;
        content: '\2807';
        font-size: 20px;
        padding: 0 5px;
      }
      
      a {
        text-decoration: none;
        color: blue;
      }
      
      a div {
        padding: 2px;
      }
      
      .dropdown {
        position: absolute;
        
        background-color: white;
        border-radius: 8px;
        outline: none;
        opacity: 0;
        z-index: -1;
        max-height: 0;
        transition: opacity 0.1s, z-index 0.1s, max-height: 5s;
      }
      
      .dropdown-container:focus {
        outline: none;
      }
      
      .dropdown-container:focus .dropdown {
        opacity: 1;
        z-index: 100;
        max-height: 100vh;
        transition: opacity 0.2s, z-index 0.2s, max-height: 0.2s;
      }</style>