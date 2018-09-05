@include('layout')
<footer>
  <div style="position: absolute; ">
      <div style="display: flex; justify-content: space-around;">
          <div >
              <img src={{ asset ('assets/img/logos1.png') }} alt="logos Gobernaci贸n" width="250px" margin-right="15px">
          </div>
      <div id="redes-sociales" style="margin-top: 3%;">

          <a href="https://www.twitter.com/" data-tip="top" data-original-title="Twitter" target="_blank">
              <img  src={{ asset ('assets/img/Twitter.png') }} alt="logo twitter" >
          </a>
          <a href="https://www.facebook.com/Gerencia-Para-las-Juventudes-del-Meta-713863738709297/" data-tip="top" data-original-title="Facebook" target="_blank">
              <img  src={{ asset ('assets/img/Facebook.png') }} alt="logo facebook">
          </a>
          <a href="https://www.youtube.com/channel/UCqyt1BtAvfhHR7In-Ndnadw/featured" data-tip="top" data-original-title="YouTube" target="_blank">
              <img  src={{ asset ('assets/img/YouTube.png') }} alt="logo youutube" >
          </a>
          <a href="https://www.instagram.com/" data-tip="top" data-original-title="Instagram" target="_blank">
              <img  src={{ asset ('assets/img/Instagram.png') }} alt="logo instagram" >
          </a>

      </div>
      <div >
          <img  src={{ asset ('assets/img/logos2.png') }} alt="logos Gobernaci贸n" width="250px" margin-left="15px">
      </div>
      </div>
  <!-- barra de colores -->
  <img src={{ asset ('assets/img/BarraDeColores.png') }} style= "vertical-align: middle; height: 30px; width: 100%;">
  </div>
</footer>
