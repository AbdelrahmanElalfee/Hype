<?php
$pageName = "Trainers";
include "shared/authUser.php";
include "shared/header.php";
$selectTrainner = "SELECT *FROM `trainner` WHERE `trainner_gym` IS NULL ";
$runTrainner = mysqli_query($mysqli, $selectTrainner);
?>

<article class="m-auto section">
  <div class="container container-custom">
    <div class="row">
      <div class="col-sm svg-custom m-auto">
        <svg class="animated" id="freepik_stories-personal-trainer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
          <g id="freepik--background-complete--inject-31" style="transform-origin: 250px 200.73px 0px;" class="animable">
            <rect y="382.4" width="500" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 250px 382.525px 0px;" id="elnji9jgvcjus" class="animable"></rect>
            <rect x="416.78" y="398.49" width="33.12" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 433.34px 398.615px 0px;" id="el7gxsxxfi67h" class="animable"></rect>
            <rect x="322.53" y="401.21" width="8.69" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 326.875px 401.335px 0px;" id="eleyguiyosh0a" class="animable"></rect>
            <rect x="396.59" y="389.21" width="19.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 406.185px 389.335px 0px;" id="el2lphrul3yoo" class="animable"></rect>
            <rect x="52.46" y="390.89" width="43.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 74.055px 391.015px 0px;" id="el8yg9qz4pghd" class="animable"></rect>
            <rect x="104.56" y="390.89" width="6.33" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 107.725px 391.015px 0px;" id="el74t7u7m2yf3" class="animable"></rect>
            <rect x="131.47" y="395.11" width="93.68" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 178.31px 395.235px 0px;" id="el0aw2zaspbvxq" class="animable"></rect>
            <path d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z" style="fill: rgb(235, 235, 235); transform-origin: 140.46px 196.4px 0px;" id="elk6d5bmftic" class="animable"></path>
            <path d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z" style="fill: rgb(235, 235, 235); transform-origin: 356.75px 196.4px 0px;" id="eldnrcr7s5ft5" class="animable"></path>
            <rect x="271.49" y="95.33" width="115.51" height="207.22" style="fill: rgb(250, 250, 250); transform-origin: 329.245px 198.94px 0px;" id="elp4f880wfz9d" class="animable"></rect>
            <polygon points="346.44 297.56 320.02 297.56 344.71 100.33 371.13 100.33 346.44 297.56" style="fill: rgb(255, 255, 255); transform-origin: 345.575px 198.945px 0px;" id="eli0kg858g6q" class="animable"></polygon>
            <polygon points="295.33 297.56 286.16 297.56 310.85 100.33 320.02 100.33 295.33 297.56" style="fill: rgb(255, 255, 255); transform-origin: 303.09px 198.945px 0px;" id="elrua9bm8k7g" class="animable"></polygon>
            <g id="elan7ryka6j0m">
              <rect x="387" y="95.33" width="2" height="207.22" style="fill: rgb(235, 235, 235); transform-origin: 388px 198.94px 0px; transform: rotate(180deg);" class="animable"></rect>
            </g>
            <rect x="410.94" width="4.61" height="119.3" style="fill: rgb(240, 240, 240); transform-origin: 413.245px 59.65px 0px;" id="els3ocemcicw8" class="animable"></rect>
            <path d="M413.24,117a19.3,19.3,0,1,0,19.31,19.29A19.29,19.29,0,0,0,413.24,117Zm0,34a14.67,14.67,0,1,1,14.67-14.67A14.66,14.66,0,0,1,413.24,150.93Z" style="fill: rgb(224, 224, 224); transform-origin: 413.25px 136.3px 0px;" id="el115bbm7lufa" class="animable"></path>
            <rect x="344.61" width="4.61" height="119.3" style="fill: rgb(240, 240, 240); transform-origin: 346.915px 59.65px 0px;" id="elbkdf67r9gd4" class="animable"></rect>
            <path d="M346.92,117a19.3,19.3,0,1,0,19.3,19.29A19.29,19.29,0,0,0,346.92,117Zm0,34a14.67,14.67,0,1,1,14.67-14.67A14.67,14.67,0,0,1,346.92,150.93Z" style="fill: rgb(224, 224, 224); transform-origin: 346.92px 136.3px 0px;" id="elwl0jrzp6t1a" class="animable"></path>
            <path d="M68.06,81.33h0a0,0,0,0,1,0,0V382.4a0,0,0,0,1,0,0H58.72a0,0,0,0,1,0,0V90.67A9.33,9.33,0,0,1,68.06,81.33Z" style="fill: rgb(245, 245, 245); transform-origin: 63.39px 231.865px 0px;" id="elu521k7s0xj" class="animable"></path>
            <g id="eln45yaohvj4">
              <rect x="68.06" y="81.33" width="5" height="301.07" style="fill: rgb(230, 230, 230); transform-origin: 70.56px 231.865px 0px; transform: rotate(180deg);" class="animable"></rect>
            </g>
            <path d="M212.5,100.33H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 97.83px 0px;" id="elbg6vrryfa2o" class="animable"></path>
            <path d="M212.5,128.68H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 126.18px 0px;" id="el6u5jx15r872" class="animable"></path>
            <path d="M212.5,157H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 154.5px 0px;" id="elghkl3gfnesg" class="animable"></path>
            <path d="M212.5,185.37H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 182.87px 0px;" id="eljuxe7nwsy3h" class="animable"></path>
            <path d="M212.5,213.72H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 211.22px 0px;" id="elfbov8bvu4i" class="animable"></path>
            <path d="M212.5,242.07H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.49,2.49,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 239.57px 0px;" id="elupmkjt152sk" class="animable"></path>
            <path d="M212.5,270.41H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 267.91px 0px;" id="elfslke4wd0u9" class="animable"></path>
            <path d="M212.5,298.76H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 296.26px 0px;" id="elgk3xuo1vch" class="animable"></path>
            <path d="M212.5,327.1H71.83a2.49,2.49,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 324.6px 0px;" id="elsv0jnfuy9u" class="animable"></path>
            <path d="M212.5,355.45H71.83a2.5,2.5,0,0,1-2.5-2.5h0a2.5,2.5,0,0,1,2.5-2.5H212.5Z" style="fill: rgb(240, 240, 240); transform-origin: 140.915px 352.95px 0px;" id="eltfpdm2vkcw" class="animable"></path>
            <path d="M217.17,81.33h0a9.34,9.34,0,0,0-9.34,9.34V382.4h9.34Z" style="fill: rgb(245, 245, 245); transform-origin: 212.5px 231.865px 0px;" id="elh1x138l4p6" class="animable"></path>
            <g id="elkzbwbsyxh0g">
              <rect x="217.17" y="81.33" width="5" height="301.07" style="fill: rgb(230, 230, 230); transform-origin: 219.67px 231.865px 0px; transform: rotate(180deg);" class="animable"></rect>
            </g>
            <path d="M280.84,324.06c-8.31,0-15,11-15,24.64s6.74,24.64,15,24.64h5.7V324.06Z" style="fill: rgb(224, 224, 224); transform-origin: 276.19px 348.7px 0px;" id="elmji2kz2v16" class="animable"></path>
            <ellipse cx="286.54" cy="348.7" rx="15.05" ry="24.64" style="fill: rgb(224, 224, 224); transform-origin: 286.54px 348.7px 0px;" id="el2y354vsb9tf" class="animable"></ellipse>
            <path d="M290.09,315c-11.37,0-20.59,15.09-20.59,33.7s9.22,33.7,20.59,33.7h7.79V315Z" style="fill: rgb(230, 230, 230); transform-origin: 283.69px 348.7px 0px;" id="elw6h4b7tpn0m" class="animable"></path>
            <ellipse cx="297.88" cy="348.7" rx="20.58" ry="33.7" style="fill: rgb(240, 240, 240); transform-origin: 297.88px 348.7px 0px;" id="el0qdt82rz3xwn" class="animable"></ellipse>
            <path d="M425.43,351.44H300.62a2.73,2.73,0,0,1-2.74-2.74h0a2.74,2.74,0,0,1,2.74-2.75H425.43Z" style="fill: rgb(230, 230, 230); transform-origin: 361.655px 348.695px 0px;" id="elfgzggv634up" class="animable"></path>
            <path d="M418.85,315c-11.36,0-20.58,15.09-20.58,33.7s9.22,33.7,20.58,33.7h7.79V315Z" style="fill: rgb(224, 224, 224); transform-origin: 412.455px 348.7px 0px;" id="el8j06dwf80qp" class="animable"></path>
            <ellipse cx="426.64" cy="348.7" rx="20.58" ry="33.7" style="fill: rgb(240, 240, 240); transform-origin: 426.64px 348.7px 0px;" id="el9l16xxooudc" class="animable"></ellipse>
            <path d="M427,324.06c-8.31,0-15.05,11-15.05,24.64s6.74,24.64,15.05,24.64h5.69V324.06Z" style="fill: rgb(224, 224, 224); transform-origin: 422.32px 348.7px 0px;" id="elbjbksn7ueqh" class="animable"></path>
            <ellipse cx="432.68" cy="348.7" rx="15.05" ry="24.64" style="fill: rgb(240, 240, 240); transform-origin: 432.68px 348.7px 0px;" id="el1p7yuym675t" class="animable"></ellipse>
          </g>
          <g id="freepik--Shadow--inject-31" style="transform-origin: 250px 416.24px 0px;" class="animable">
            <ellipse id="freepik--path--inject-31" cx="250" cy="416.24" rx="193.89" ry="11.32" style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px 0px;" class="animable"></ellipse>
          </g>
          <g id="freepik--character-1--inject-31" style="transform-origin: 183.778px 285.888px 0px;" class="animable">
            <path d="M165,206.28a24.51,24.51,0,0,1,8.66,2.38l8.21,3.46c2.73,1.13,5.45,2.25,8.16,3.29a71.71,71.71,0,0,0,8,2.61c.63.15,1.25.29,1.84.4l1.91.28,2.07.19,2.14.1c2.9.11,5.89.09,8.88,0s6-.21,9-.39,6.06-.34,9.05-.58h0a3.07,3.07,0,0,1,1,6c-6,1.52-12,2.81-18.19,3.89-3.08.54-6.18,1-9.38,1.39l-2.42.24-2.51.15c-.88,0-1.75,0-2.65,0s-1.83-.11-2.71-.2a87.37,87.37,0,0,1-9.79-1.74c-3.13-.71-6.19-1.57-9.2-2.5s-6-2-8.88-3.07a23.1,23.1,0,0,1-8.23-4.7,6.53,6.53,0,0,1,4.73-11.29Z" style="fill: rgb(255, 195, 189); transform-origin: 196.986px 217.937px 0px;" id="el9jwurk8wmon" class="animable"></path>
            <path d="M229.42,219l5.91-2a8.85,8.85,0,0,1,3.82-.42l3.18.34a2.84,2.84,0,0,1,2.52,3.18l-.44,3.47a2.85,2.85,0,0,1-2.72,2.48l-4.1.14s-7.33,1.51-8.76-2.25Z" style="fill: rgb(255, 195, 189); transform-origin: 236.851px 221.508px 0px;" id="elwb3safknryf" class="animable"></path>
            <path d="M136.72,202.46c7.25-2.37,16-1.29,16-1.29l15.79,4.32a8,8,0,0,1,5.72,7.64c.34,19.58-3.56,29.26-6.1,65.4-1.38-.14-42.2-3.62-42.2-3.62,3.82-20.11-.18-35.05-.08-56.16C125.91,207.33,131.26,204.24,136.72,202.46Z" style="fill: rgb(38, 50, 56); transform-origin: 150.049px 239.727px 0px;" id="eldadokrkoama" class="animable"></path>
            <g id="eltunktza12dg">
              <ellipse cx="137.14" cy="217.8" rx="8.51" ry="12.03" style="fill: rgb(255, 195, 189); opacity: 0.7; transform-origin: 137.14px 217.8px 0px; transform: rotate(-23.5deg);" class="animable"></ellipse>
            </g>
            <path d="M137.12,206.32a24.55,24.55,0,0,1,8,4.26l7.37,5.21c2.46,1.73,4.91,3.42,7.36,5a69.34,69.34,0,0,0,7.31,4.25,49.31,49.31,0,0,0,7.87,2.74c2.87.79,5.84,1.49,8.81,2.17s6,1.3,9,1.89,6,1.22,9.05,1.77h0a3.07,3.07,0,0,1-.61,6.09c-6.28-.11-12.5-.4-18.78-.89-3.15-.25-6.29-.52-9.49-.92-1.6-.21-3.21-.43-4.87-.73-.81-.12-1.7-.35-2.55-.52s-1.81-.47-2.64-.74a82.06,82.06,0,0,1-9.39-3.82c-2.95-1.38-5.8-2.88-8.58-4.46s-5.48-3.25-8.14-5a23.51,23.51,0,0,1-7.13-6.43,6.53,6.53,0,0,1,7.05-10Z" style="fill: rgb(255, 195, 189); transform-origin: 166.492px 222.838px 0px;" id="elsuhgomjkm" class="animable"></path>
            <path d="M198.3,233.41l5.81-2.25a9,9,0,0,1,3.8-.6l3.19.19a2.84,2.84,0,0,1,2.66,3.07l-.28,3.48a2.85,2.85,0,0,1-2.6,2.6l-4.09.34s-7.25,1.84-8.85-1.85Z" style="fill: rgb(255, 195, 189); transform-origin: 205.855px 235.622px 0px;" id="ellzf0o1rmzx" class="animable"></path>
            <path d="M144,179c-5.73.39-3.58,11.5,2.08,13S151.83,178.42,144,179Z" style="fill: rgb(38, 50, 56); transform-origin: 145.376px 185.544px 0px;" id="elatx34gj8ibt" class="animable"></path>
            <path d="M168.56,167c-5-4.46-12.49,6.33-9.1,12.23S175.39,173.1,168.56,167Z" style="fill: rgb(38, 50, 56); transform-origin: 164.586px 173.381px 0px;" id="elep06zqod8pd" class="animable"></path>
            <path d="M145.13,181.76c-.19,5.82-.78,13.41-3.1,20.15.54,3.94,7.68,6,15.46,8.74,4.44-2.52,5.55-4.55,3.86-7.15-6.51-1.78-4.27-8.08-2.81-12.63Z" style="fill: rgb(255, 195, 189); transform-origin: 152.066px 196.205px 0px;" id="el980mjhh9dtc" class="animable"></path>
            <g id="el4kmpl3e5cb">
              <path d="M158,190.48l.59.39a30.87,30.87,0,0,0-1.51,5.8c-3-.28-6-1.47-7.46-3.53a13.84,13.84,0,0,1-2.28-4.57Z" style="opacity: 0.2; transform-origin: 152.965px 192.62px 0px;" class="animable"></path>
            </g>
            <path d="M143.78,174.55c.43,8,.28,12.74,4.31,16.85,6.06,6.18,16,2.49,18-5.52,1.77-7.21.76-19.11-7.08-22.29A11.06,11.06,0,0,0,143.78,174.55Z" style="fill: rgb(255, 195, 189); transform-origin: 155.296px 178.632px 0px;" id="el0fptv8oz8scl" class="animable"></path>
            <path d="M142,181.33s8.49,3.43,6.65-1.1c0,0,4-5.49.5-9.06,5.12,1.27,10.5-1.11,10.62-2.61,2.61,3.34,8.81,3,8.5-1.28,1.78-1.49,3.77-6.15-1.19-8.53-3.38-1.62-7.37,1.08-7.37,1.08s-4.61-5.55-10.67-4-6.16,6.11-6.16,6.11-7-.61-8.89,3.95,2,7.85,2,7.85S133.45,181.72,142,181.33Z" style="fill: rgb(38, 50, 56); transform-origin: 151.842px 169.065px 0px;" id="el6a2qahuvn3r" class="animable"></path>
            <path d="M139.92,182.41a7.55,7.55,0,0,0,4.49,3.69c2.57.76,3.91-1.53,3.25-4-.6-2.2-2.66-5.24-5.26-4.92A3.44,3.44,0,0,0,139.92,182.41Z" style="fill: rgb(255, 195, 189); transform-origin: 143.614px 181.702px 0px;" id="elkuzhcbz98w" class="animable"></path>
            <path d="M156.94,176.29c0,.65.34,1.18.77,1.18s.78-.53.78-1.18-.34-1.18-.76-1.18S157,175.64,156.94,176.29Z" style="fill: rgb(38, 50, 56); transform-origin: 157.715px 176.29px 0px;" id="elk9inbbfbby" class="animable"></path>
            <path d="M158.54,185.45c0,.65.34,1.18.77,1.18s.78-.53.78-1.18-.34-1.18-.76-1.18S158.55,184.8,158.54,185.45Z" style="fill: rgb(38, 50, 56); transform-origin: 159.315px 185.45px 0px;" id="elxywlymy8d2" class="animable"></path>
            <path d="M164.52,176.84c0,.65.34,1.18.76,1.18s.78-.53.78-1.19-.33-1.18-.76-1.18S164.52,176.18,164.52,176.84Z" style="fill: rgb(38, 50, 56); transform-origin: 165.29px 176.835px 0px;" id="ellizi6bnw1ha" class="animable"></path>
            <path d="M162.21,177.09a23.29,23.29,0,0,0,3.08,5.58,3.79,3.79,0,0,1-3.13.59Z" style="fill: rgb(237, 132, 126); transform-origin: 163.725px 180.233px 0px;" id="elo8teakt46gq" class="animable"></path>
            <path d="M154.81,173.72a.34.34,0,0,1-.16-.1.38.38,0,0,1,0-.54A3.85,3.85,0,0,1,158,172a.37.37,0,0,1,.29.45.38.38,0,0,1-.45.3h0a3.08,3.08,0,0,0-2.63.92A.37.37,0,0,1,154.81,173.72Z" style="fill: rgb(38, 50, 56); transform-origin: 156.419px 172.853px 0px;" id="els8dm65iuqu8" class="animable"></path>
            <path d="M167.17,174.41a.36.36,0,0,1-.33-.15,3.06,3.06,0,0,0-2.46-1.27.37.37,0,0,1-.4-.35.38.38,0,0,1,.36-.41,3.74,3.74,0,0,1,3.11,1.57.38.38,0,0,1-.08.54A.37.37,0,0,1,167.17,174.41Z" style="fill: rgb(38, 50, 56); transform-origin: 165.754px 173.321px 0px;" id="elecqv8xhp01r" class="animable"></path>
            <path d="M150.21,403.48Z" style="fill: rgb(178, 224, 0); transform-origin: 150.21px 403.48px 0px;" id="el3ntgunrm3rn" class="animable"></path>
            <path d="M168.63,275.2,126,271.7a.49.49,0,0,0-.52.43l-.29,2.79a.48.48,0,0,0,.43.53L168,279.63a.48.48,0,0,0,.52-.4l.58-3.46A.49.49,0,0,0,168.63,275.2Z" style="fill: rgb(178, 224, 0); transform-origin: 147.147px 275.666px 0px;" id="elbzhaozxfnv" class="animable"></path>
            <path d="M196.81,322.58c-26.13-5.71-43.89-13.31-43.89-13.31l13.89-28.66s58.36,19.17,52.34,37.51c-11.54,35.2-21.32,89.73-21.32,89.73h-9.34C192.2,367,184.79,340,196.81,322.58Z" style="fill: rgb(255, 195, 189); transform-origin: 186.253px 344.23px 0px;" id="el2i81j8plids" class="animable"></path>
            <path d="M197.85,406.87l-10,.14a.63.63,0,0,0-.63.57l-.77,7.22a1.32,1.32,0,0,0,1.33,1.42c3.18-.1,9-.36,13-.42,4.68-.08,4.23.12,9.72,0,3.32-.05,3.85-3.43,2.43-3.71-6.49-1.29-7.14-1.36-13-4.65A4.15,4.15,0,0,0,197.85,406.87Z" style="fill: rgb(38, 50, 56); transform-origin: 200.058px 411.545px 0px;" id="el1fjdr0xhwjo" class="animable"></path>
            <path d="M199.32,407.59a.18.18,0,0,1-.13-.15.2.2,0,0,1,.1-.2c.36-.19,3.59-1.89,4.58-1.36a.59.59,0,0,1,.33.5h0a1.07,1.07,0,0,1-.35.94c-.87.8-3.2.52-4.51.28Zm4.3-1.4c-.61-.21-2.37.5-3.64,1.13,1.79.27,3.12.17,3.62-.28a.72.72,0,0,0,.22-.62.22.22,0,0,0-.13-.2A.09.09,0,0,0,203.62,406.19Z" style="fill: rgb(178, 224, 0); transform-origin: 201.699px 406.814px 0px;" id="elnt19wco3txd" class="animable"></path>
            <path d="M199.32,407.59l0,0a.17.17,0,0,1-.08-.17c0-.1.19-2.28,1.2-3.14a1.4,1.4,0,0,1,1.06-.35h0c.53,0,.69.31.72.53.17.91-1.74,2.69-2.71,3.15A.17.17,0,0,1,199.32,407.59Zm2.3-3.26-.2,0h0a1,1,0,0,0-.78.26,4.56,4.56,0,0,0-1,2.51c1-.61,2.28-2,2.19-2.56C201.79,404.47,201.78,404.38,201.62,404.33Zm-.19-.23h0Z" style="fill: rgb(178, 224, 0); transform-origin: 200.734px 405.777px 0px;" id="elvxa40ivp6t" class="animable"></path>
            <path d="M168.42,277.94s17.13,7.46,26.71,12.59a1.42,1.42,0,0,1,.63,1.89A82.7,82.7,0,0,0,188,321.16a1.52,1.52,0,0,1-1.79,1.35c-9.53-1.61-55.32-11.25-50.58-47.12C145.82,275.87,168.42,277.94,168.42,277.94Z" style="fill: rgb(178, 224, 0); transform-origin: 165.596px 298.963px 0px;" id="elfsza2ow5yap" class="animable"></path>
            <path d="M150.38,276.4s-14-2-24.17-2.49c-14.67,45.86,20.66,47.65,28.87,48.5a2.66,2.66,0,0,0,2.33-.92c5.82-7.13,10.36-16.94,8.55-29.14a2.47,2.47,0,0,0-1.22-1.75C156.07,285.36,150.38,276.4,150.38,276.4Z" style="fill: rgb(178, 224, 0); transform-origin: 144.524px 298.169px 0px;" id="el5gg7dsyqsho" class="animable"></path>
            <path d="M157,291.2c-8.38,1.24-13.84,24.67-8.81,27.95,4.72,2,9.83,3.38,13,3.43-12,17.41-4.61,44.43-8.33,85.27h9.34s9.78-54.53,21.32-89.73C186.69,308.38,171.74,298.41,157,291.2Z" style="fill: rgb(255, 195, 189); transform-origin: 165.105px 349.525px 0px;" id="elhtzwf52jju" class="animable"></path>
            <path d="M162.19,406.87l-10,.14a.64.64,0,0,0-.63.57l-.77,7.22a1.32,1.32,0,0,0,1.33,1.42c3.18-.1,9-.36,13-.42,4.68-.08,4.23.12,9.72,0,3.32-.05,3.85-3.43,2.43-3.71-6.49-1.29-7.14-1.36-13-4.65A4.12,4.12,0,0,0,162.19,406.87Z" style="fill: rgb(38, 50, 56); transform-origin: 164.398px 411.545px 0px;" id="el7f0rh0nb5bn" class="animable"></path>
            <path d="M163.66,407.59a.18.18,0,0,1-.13-.15.2.2,0,0,1,.1-.2c.36-.19,3.59-1.89,4.59-1.36a.6.6,0,0,1,.32.5h0a1.06,1.06,0,0,1-.34.94c-.88.8-3.21.52-4.51.28Zm4.3-1.4c-.61-.21-2.36.5-3.64,1.13,1.79.27,3.13.17,3.62-.28a.72.72,0,0,0,.22-.62.22.22,0,0,0-.13-.2A.09.09,0,0,0,168,406.19Z" style="fill: rgb(178, 224, 0); transform-origin: 166.04px 406.814px 0px;" id="elp64vmyyji8o" class="animable"></path>
            <path d="M163.66,407.59l0,0a.17.17,0,0,1-.08-.17c0-.1.19-2.28,1.2-3.14a1.4,1.4,0,0,1,1.06-.35h0c.53,0,.69.31.73.53.16.91-1.75,2.69-2.72,3.15A.17.17,0,0,1,163.66,407.59Zm2.3-3.26-.2,0h0a1,1,0,0,0-.78.26,4.63,4.63,0,0,0-1,2.51c1-.61,2.29-2,2.19-2.56C166.13,404.47,166.12,404.38,166,404.33Zm-.18-.23Z" style="fill: rgb(178, 224, 0); transform-origin: 165.079px 405.777px 0px;" id="elkpcp3gj0loh" class="animable"></path>
          </g>
          <g id="freepik--character-2--inject-31" style="transform-origin: 325.832px 251.165px 0px;" class="animable">
            <path d="M324.14,110.79c-.53-4.62-1.16-13.6,2.69-15.45,10.39-1.39,21.56,9.16,22.9,11.76s.78,14.09-4.06,16.24S324.14,110.79,324.14,110.79Z" style="fill: rgb(38, 50, 56); transform-origin: 337.051px 109.385px 0px;" id="ely2je55wntg" class="animable"></path>
            <path d="M323,145.55a18.24,18.24,0,0,1,.67,5.27,30.84,30.84,0,0,1-.55,5.08c-.58,3.35-1.27,6.69-2.12,10a97.87,97.87,0,0,1-3.1,10,63.15,63.15,0,0,1-4.73,10.25l-.84,1.34-1,1.36c-.62.76-1.23,1.49-1.85,2.19l-1.84,2L305.82,195c-2.46,2.42-4.95,4.68-7.46,6.9-5.06,4.41-10.18,8.56-15.48,12.61A3.74,3.74,0,0,1,277.8,209l0,0c4.28-4.85,8.55-9.8,12.6-14.79,2-2.48,4-5,5.84-7.51l1.33-1.88,1.22-1.86,1-1.78.34-.71.34-.81a48.3,48.3,0,0,0,2.2-8.06c.57-2.92,1-6,1.49-9s.85-6.17,1.23-9.29a22.71,22.71,0,0,1,2.56-9.11l.23-.41a8.08,8.08,0,0,1,14.75,1.8Z" style="fill: rgb(255, 139, 123); transform-origin: 300.133px 177.632px 0px;" id="el9z5pxdosane" class="animable"></path>
            <path d="M280.27,207.9l-6.2,2.36a9.67,9.67,0,0,0-3.43,2.24l-2.39,2.43a3,3,0,0,0,.08,4.32L271,221.8A3,3,0,0,0,275,222l3.47-2.65s7.05-3.71,5.69-7.77Z" style="fill: rgb(255, 139, 123); transform-origin: 275.853px 215.284px 0px;" id="el9bfnvuh1efe" class="animable"></path>
            <path d="M359.6,139l-23.74-4.08-20.19,3.31a9.22,9.22,0,0,0-7.63,8.55c-1.54,22.36,2.43,33.15,3.06,68.49,1.48,0,45.14.74,45.14.74-1.07-19.18,8.81-43.22,10.9-67.21A9.13,9.13,0,0,0,359.6,139Z" style="fill: rgb(178, 224, 0); transform-origin: 337.432px 175.465px 0px;" id="elabpftk20fnc" class="animable"></path>
            <path d="M346.31,115.22c-.45,6.18-.67,14.29,1,21.68-1,4.12-8.36,8.47-16.9,10.5-6.68-3.34-5.82-8.41-3.74-11,7.1-1.15,5.43-8.07,4.39-13Z" style="fill: rgb(255, 139, 123); transform-origin: 336.236px 131.31px 0px;" id="elmbobkt2ps9" class="animable"></path>
            <path d="M328.1,159.81H328a.38.38,0,0,1-.26-.19c-8.64-14.91-2.26-23-2-23.34a.4.4,0,1,1,.62.51c-.25.32-6.2,7.86,1.84,22,12.39-8.87,18.45-18.64,18.95-21.94a.4.4,0,0,1,.45-.34.41.41,0,0,1,.34.46c-.52,3.45-6.81,13.66-19.64,22.74A.48.48,0,0,1,328.1,159.81Z" style="fill: rgb(38, 50, 56); transform-origin: 335.586px 147.972px 0px;" id="elw417vs79mw" class="animable"></path>
            <path d="M327.34,157.27h2.09a0,0,0,0,1,0,0v8.11a0,0,0,0,1,0,0h-4.12a0,0,0,0,1,0,0V159.3A2,2,0,0,1,327.34,157.27Z" style="fill: rgb(38, 50, 56); transform-origin: 327.37px 161.325px 0px;" id="elwajgznxagq" class="animable"></path>
            <path d="M330,161.32h0a2,2,0,0,1-2-2v-2h2a2,2,0,0,1,2,2h0A2,2,0,0,1,330,161.32Z" style="fill: rgb(38, 50, 56); transform-origin: 330px 159.32px 0px;" id="eldum4tx3ssco" class="animable"></path>
            <g id="elw8vsoxblnm">
              <path d="M331.75,123l-.67.35a32.67,32.67,0,0,1,.95,6.31c3.21,0,6.54-.89,8.3-2.91a15,15,0,0,0,2.92-4.58Z" style="opacity: 0.2; transform-origin: 337.165px 125.915px 0px;" class="animable"></path>
            </g>
            <g id="ell7ccjpi1ob">
              <path d="M362.46,147.15c-1.8.77-4.86,5.7-4.57,10.95A27,27,0,0,0,363.06,173c1.44-6.48,2.77-13.08,3.6-19.72Z" style="opacity: 0.2; transform-origin: 362.265px 160.075px 0px;" class="animable"></path>
            </g>
            <path d="M348.54,107.73c-1.35,8.45-1.72,13.46-6.44,17.36-7.1,5.87-17.22.85-18.41-7.85-1.08-7.83,1.32-20.32,10-22.81A11.78,11.78,0,0,1,348.54,107.73Z" style="fill: rgb(255, 139, 123); transform-origin: 336.077px 110.802px 0px;" id="elqvxlua7lyrn" class="animable"></path>
            <path d="M347.57,114.41c-3.5-2.91-6.45-9.41-4-14.69-6.41,1.29-17.07,1.94-20.14-4.11-2.14-4.21-.81-8.81,4.06-9.5,2.53,4,7.87,3.09,12.4,2.37s16.21-2.37,15.07,6.43C360.42,95.52,363.26,107.61,347.57,114.41Z" style="fill: rgb(38, 50, 56); transform-origin: 340.866px 100.26px 0px;" id="eleb095phrxxt" class="animable"></path>
            <path d="M351.75,116.49a8,8,0,0,1-5.17,3.41c-2.8.51-4-2.07-3-4.58.88-2.26,3.4-5.25,6.12-4.62S353.2,114.29,351.75,116.49Z" style="fill: rgb(255, 139, 123); transform-origin: 347.85px 115.29px 0px;" id="elrojhixz67wp" class="animable"></path>
            <path d="M336.93,300.9c-.33-43.39,8.63-85,8.63-85L312,215.27s1.7,62.86,5.21,88.9c4.7,35,4.28,103.14,4.28,103.14h9.95S342.92,340.93,336.93,300.9Z" style="fill: rgb(255, 139, 123); transform-origin: 328.78px 311.29px 0px;" id="ellgrbwi2e9fd" class="animable"></path>
            <path d="M321.46,406.27l10.7.14a.68.68,0,0,1,.67.6l.82,7.7a1.41,1.41,0,0,1-1.42,1.51c-3.39-.11-9.56-.38-13.82-.45-5-.08-4.5.13-10.35,0-3.54-.05-4.11-3.65-2.59-3.95,6.91-1.37,7.61-1.44,13.84-4.94A4.17,4.17,0,0,1,321.46,406.27Z" style="fill: rgb(38, 50, 56); transform-origin: 319.166px 411.245px 0px;" id="eld6lbzcd4mkp" class="animable"></path>
            <path d="M319.9,407a.19.19,0,0,0,.14-.16.21.21,0,0,0-.11-.21c-.38-.21-3.82-2-4.88-1.45a.67.67,0,0,0-.35.54h0a1.15,1.15,0,0,0,.37,1c.93.86,3.41.56,4.8.3Zm-4.58-1.5c.65-.21,2.52.54,3.88,1.21-1.91.29-3.33.18-3.85-.3a.71.71,0,0,1-.24-.66.24.24,0,0,1,.13-.21Z" style="fill: rgb(178, 224, 0); transform-origin: 317.366px 406.183px 0px;" id="elkt25olwl1mj" class="animable"></path>
            <path d="M319.9,407l.05,0a.2.2,0,0,0,.09-.19c0-.09-.2-2.42-1.28-3.34a1.52,1.52,0,0,0-1.13-.37h0c-.56.05-.73.33-.77.56-.18,1,1.86,2.87,2.89,3.36A.19.19,0,0,0,319.9,407Zm-2.45-3.47.21,0h0a1.08,1.08,0,0,1,.83.27,4.84,4.84,0,0,1,1.1,2.68c-1.06-.66-2.43-2.14-2.33-2.73C317.27,403.71,317.28,403.61,317.45,403.56Zm.2-.24h0Z" style="fill: rgb(178, 224, 0); transform-origin: 318.445px 405.061px 0px;" id="el278z8katqvqh" class="animable"></path>
            <g id="elnjp9gpil86s">
              <path d="M336.24,252.26c-2.5,3.13-2.57,11.28,1.68,20,.28-3.91.61-7.73,1-11.4Z" style="opacity: 0.2; transform-origin: 336.716px 262.26px 0px;" class="animable"></path>
            </g>
            <path d="M335.66,108.73c-.07.7-.49,1.22-1,1.17s-.76-.65-.69-1.34.49-1.22.94-1.17S335.72,108,335.66,108.73Z" style="fill: rgb(38, 50, 56); transform-origin: 334.813px 108.645px 0px;" id="elnertbpiw5w" class="animable"></path>
            <path d="M326.09,107.84c-.07.69-.49,1.21-.95,1.16s-.76-.65-.69-1.34.49-1.21.94-1.16S326.15,107.15,326.09,107.84Z" style="fill: rgb(38, 50, 56); transform-origin: 325.269px 107.75px 0px;" id="elyrjs63agke" class="animable"></path>
            <path d="M330,108.5a24.36,24.36,0,0,1-3.89,5.56,4,4,0,0,0,3.25,1Z" style="fill: rgb(255, 86, 82); transform-origin: 328.055px 111.8px 0px;" id="elyhzt9dpkpr" class="animable"></path>
            <path d="M332.14,117.2a5.66,5.66,0,0,0,4.13-1.85.2.2,0,0,0,0-.28.21.21,0,0,0-.29,0,5.48,5.48,0,0,1-4.68,1.67.2.2,0,0,0-.22.18.2.2,0,0,0,.18.22A5.69,5.69,0,0,0,332.14,117.2Z" style="fill: rgb(38, 50, 56); transform-origin: 333.703px 116.106px 0px;" id="el7jwegao82k9" class="animable"></path>
            <path d="M337.49,104.3a.36.36,0,0,0,.2-.06.41.41,0,0,0,.13-.56,4.07,4.07,0,0,0-3.14-2,.41.41,0,1,0,0,.81h0a3.29,3.29,0,0,1,2.48,1.64A.42.42,0,0,0,337.49,104.3Z" style="fill: rgb(38, 50, 56); transform-origin: 336.043px 102.988px 0px;" id="el91vu2juxbih" class="animable"></path>
            <path d="M324.07,105.25a.4.4,0,0,0,.35-.16,3.23,3.23,0,0,1,2.64-1.3.39.39,0,0,0,.44-.37.4.4,0,0,0-.37-.44,4,4,0,0,0-3.35,1.6.41.41,0,0,0,.07.58A.47.47,0,0,0,324.07,105.25Z" style="fill: rgb(38, 50, 56); transform-origin: 325.596px 104.114px 0px;" id="elzms72pg2cg" class="animable"></path>
            <path d="M368.09,299.81c-6-38.78-7.27-75.14-13-83.8l-28.48-.49s16.83,61.3,23.32,87.13c6.75,26.86,23.32,104.56,23.32,104.56l9.08.2S381.18,330.18,368.09,299.81Z" style="fill: rgb(255, 139, 123); transform-origin: 354.47px 311.465px 0px;" id="el7cesv2hj75x" class="animable"></path>
            <path d="M372.38,406.27l10.42.14a.68.68,0,0,1,.67.6l.82,7.7a1.41,1.41,0,0,1-1.42,1.51c-3.39-.11-5.47-.38-9.74-.45-5-.08-2.68.13-8.53,0-3.53-.05-4.33-3.25-2.84-3.67,4.72-1.32,6.3-3.19,8.46-5.22A3,3,0,0,1,372.38,406.27Z" style="fill: rgb(38, 50, 56); transform-origin: 372.671px 411.236px 0px;" id="el4qi64qa8m55" class="animable"></path>
            <path d="M373,406.92a.21.21,0,0,0,.19-.11.2.2,0,0,0,0-.23c-.29-.33-2.9-3.21-4.09-3a.64.64,0,0,0-.51.38h0a1.19,1.19,0,0,0,0,1.07c.58,1.12,3,1.69,4.41,1.93Zm-3.79-3c.69,0,2.19,1.36,3.23,2.46-1.89-.39-3.19-1-3.52-1.6a.75.75,0,0,1,0-.7.25.25,0,0,1,.2-.16Z" style="fill: rgb(178, 224, 0); transform-origin: 370.845px 405.265px 0px;" id="elugayu2xodmq" class="animable"></path>
            <path d="M373,406.92h.06a.2.2,0,0,0,.14-.14c0-.1.65-2.35-.05-3.58a1.46,1.46,0,0,0-.94-.73h0c-.54-.15-.8.05-.91.26-.5.85.76,3.33,1.56,4.14A.2.2,0,0,0,373,406.92Zm-1.1-4.11.21,0h0a1.08,1.08,0,0,1,.68.54,4.8,4.8,0,0,1,.11,2.89c-.76-1-1.55-2.85-1.25-3.36C371.71,402.89,371.76,402.81,371.94,402.81Zm.26-.16h0Z" style="fill: rgb(178, 224, 0); transform-origin: 372.33px 404.669px 0px;" id="el7jraesadixa" class="animable"></path>
            <path d="M325,214.7s7.3,35.36,8.08,47.32a168,168,0,0,0,30.74-4.3s3.24-24.75-7.61-42.2C345.38,214.91,325,214.7,325,214.7Z" style="fill: rgb(38, 50, 56); transform-origin: 344.636px 238.36px 0px;" id="elml0f2nxxm5" class="animable"></path>
            <path d="M359.07,259.17h0a.54.54,0,0,1-.53-.55c.34-18.84-7.1-41.75-7.18-42a.54.54,0,0,1,1-.33c.07.23,7.57,23.31,7.22,42.33A.53.53,0,0,1,359.07,259.17Z" style="fill: rgb(255, 255, 255); transform-origin: 355.475px 237.599px 0px;" id="el1dxwrjda86e" class="animable"></path>
            <path d="M355.66,259.77h0a.54.54,0,0,1-.52-.55c.34-18.84-7.3-42.34-7.37-42.58a.54.54,0,0,1,.34-.68.55.55,0,0,1,.68.35c.08.23,7.77,23.91,7.42,42.93A.53.53,0,0,1,355.66,259.77Z" style="fill: rgb(255, 255, 255); transform-origin: 351.982px 237.853px 0px;" id="elr98333c6tf" class="animable"></path>
            <path d="M311,211.56l45.51,1a.5.5,0,0,1,.5.51v3a.51.51,0,0,1-.51.52l-45.28-.3a.51.51,0,0,1-.51-.48l-.23-3.73A.5.5,0,0,1,311,211.56Z" style="fill: rgb(38, 50, 56); transform-origin: 333.745px 214.075px 0px;" id="ele7vt1i2zifg" class="animable"></path>
            <path d="M310.89,214.7s1.1,32.81,1.1,43.83c14.87,2.86,32.84,1.09,32.84,1.09s11.3-26.65,1.09-44.1C335.07,214.91,310.89,214.7,310.89,214.7Z" style="fill: rgb(38, 50, 56); transform-origin: 330.541px 237.431px 0px;" id="elmcy9vnr8gie" class="animable"></path>
            <g id="elfadquhdda9v">
              <rect x="344.26" y="187.97" width="28.79" height="37.18" rx="1.04" ry="1.04" style="fill: rgb(178, 224, 0); transform-origin: 358.655px 206.56px 0px; transform: rotate(-56.65deg);" class="animable"></rect>
            </g>
            <g id="el5vqykj4xu0s">
              <rect x="344.6" y="187.46" width="28.79" height="37.18" rx="1.04" ry="1.04" style="fill: rgb(178, 224, 0); transform-origin: 358.995px 206.05px 0px; transform: rotate(-56.65deg);" class="animable"></rect>
            </g>
            <g id="el2334ae0g8rd">
              <rect x="344.6" y="187.46" width="28.79" height="37.18" rx="1.04" ry="1.04" style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 358.995px 206.05px 0px; transform: rotate(-56.65deg);" class="animable"></rect>
            </g>
            <g id="elnhq2ic3rw4">
              <polygon points="380.08 204.37 366.04 226.28 337.64 207.59 351.94 185.85 380.08 204.37" style="opacity: 0.2; transform-origin: 358.86px 206.065px 0px;" class="animable"></polygon>
            </g>
            <path d="M380.22,203.52l-14.47,22A302.51,302.51,0,0,1,337.55,207q7.23-11,14.48-22A302.36,302.36,0,0,0,380.22,203.52Z" style="fill: rgb(255, 255, 255); transform-origin: 358.885px 205.26px 0px;" id="el75wchml2qwt" class="animable"></path>
            <g id="el3ua3ebwxj28">
              <path d="M343.3,199.68l-.26.42a.92.92,0,0,1-1.34.24l-.73-.53a.11.11,0,0,1,0-.15l.76-1.15a.1.1,0,0,1,.15,0l1.43,1A.11.11,0,0,1,343.3,199.68Z" style="opacity: 0.4; transform-origin: 342.143px 199.503px 0px;" class="animable"></path>
            </g>
            <path d="M344.5,191.27,340,198.19a.85.85,0,0,0,.3,1.23l1.62.91a1,1,0,0,0,1.33-.33l4.56-6.92a.87.87,0,0,0-.31-1.24l-1.61-.9A1,1,0,0,0,344.5,191.27Z" style="fill: rgb(38, 50, 56); transform-origin: 343.902px 195.622px 0px;" id="elz9eart42pw" class="animable"></path>
            <path d="M361.85,208.31l-5.69,3.41a9.49,9.49,0,0,0-3,2.8l-1.93,2.81a3,3,0,0,0,.84,4.24l3.11,2a3,3,0,0,0,3.89-.48l3-3.22s6.29-4.89,4.23-8.65Z" style="fill: rgb(255, 139, 123); transform-origin: 358.703px 216.193px 0px;" id="elh4iz5vsq0vv" class="animable"></path>
            <path d="M364.47,141.56a16.83,16.83,0,0,1,4,3.3,27.22,27.22,0,0,1,2.92,4c1.76,2.78,3.44,5.63,5,8.61a84.49,84.49,0,0,1,4.16,9.36,53,53,0,0,1,2.88,10.77c.07.5.13,1,.17,1.57l.06.8c0,.28,0,.64,0,1a15.13,15.13,0,0,1-.1,1.84c0,.61-.15,1.13-.24,1.67a30.62,30.62,0,0,1-1.68,5.65,63.42,63.42,0,0,1-4.66,9.25,130.13,130.13,0,0,1-11.45,15.89,3.74,3.74,0,0,1-6.15-4.19l0-.09c1.43-2.61,2.83-5.42,4.13-8.16s2.52-5.53,3.58-8.3a54.06,54.06,0,0,0,2.51-8.13,16.92,16.92,0,0,0,.4-3.51,4.47,4.47,0,0,0,0-.67,1.82,1.82,0,0,0-.1-.5l-.16-.58c-.06-.23-.14-.48-.23-.75a37.29,37.29,0,0,0-3.27-7c-1.42-2.42-3-4.86-4.61-7.29s-3.33-4.87-5.05-7.3a30.17,30.17,0,0,1-2.43-3.76,14.52,14.52,0,0,1-1.57-4.29l-.15-1a8.09,8.09,0,0,1,12.07-8.23Z" style="fill: rgb(255, 139, 123); transform-origin: 367.997px 178.51px 0px;" id="el3079b6rbwnj" class="animable"></path>
          </g>
          <defs>
            <filter id="active" height="200%">
              <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
              <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
              <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
              <feMerge>
                <feMergeNode in="OUTLINE"></feMergeNode>
                <feMergeNode in="SourceGraphic"></feMergeNode>
              </feMerge>
            </filter>
            <filter id="hover" height="200%">
              <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
              <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
              <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
              <feMerge>
                <feMergeNode in="OUTLINE"></feMergeNode>
                <feMergeNode in="SourceGraphic"></feMergeNode>
              </feMerge>
              <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>
            </filter>
          </defs>
        </svg>
      </div>
      <div class="col-sm justify-content-center m-auto home-content">
        <h2>“Take care of your body. It's the only place you have to live.”</h2>
        <p class="mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere porro illo veritatis quis
          nesciunt ut nobis dolor dignissimos, ea quasi iure iusto quaerat cum, blanditiis mollitia,
          tempora illum a tenetur?</p>
      </div>
    </div>
  </div>

</article>

<article class="mt-5">
  <div class="container col-10">
    <h2 class="font-weight-bold mb-4">Personal Trainers</h2>
    <div class="row pb-5 mb-4">
      <?php foreach ($runTrainner as $data) {
        $accounts = explode(",", $data['tr_account']);
        $accLength = count($accounts);
      ?>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
          <!-- Card-->
          <a href="personView.php?trainer=<?php echo $data['trainner_id'] ?>">
            <div class="card shadow-sm border-0 rounded h-100">
              <div class="card-body p-0 text-center"><img style="height:40vh" src="admin/upload/<?php echo $data['trainner_image'] ?>" alt="" class="w-100 card-img-top">
                <div class="p-4">
                  <h5 class="mb-0"><?php echo $data['trainner_name'] ?></h5>
                  <p class="small text-muted"><?php echo $data['trainner_experience'] ?></p>
                  <ul class="social mb-0 list-inline mt-3">
                    <?php
                    for ($i = 0; $i < $accLength; $i++) {
                      if (str_contains($accounts[$i], 'https://www.instagram.com/')) {
                    ?>
                        <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-instagram"></i></a></li>
                      <?php }
                      if (str_contains($accounts[$i], 'https://www.facebook.com/')) {
                      ?>
                        <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                      <?php
                      }
                      if (str_contains($accounts[$i], 'https://twitter.com/')) {
                      ?>
                        <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-twitter"></i></a></li>
                      <?php }
                      if (str_contains($accounts[$i], 'https://www.linkedin.com/')) { ?>
                        <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                    <?php }
                    } ?>
                  </ul>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>


    </div>
  </div>
  </div>
</article>
<?php
include "shared/footer.php";
?>