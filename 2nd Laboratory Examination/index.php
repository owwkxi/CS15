<?php
$siteTitle = 'Libris Arcanun';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@700&family=Over+the+Rainbow&family=Mea+Culpa&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#2b1d17; --sepia:#5a3a2e; --wood:#4a2f20; --paper:#f4e8c8; --paper-edge:#dcc58d;
  --err:#8f2d1f; --ok:#3f6b3a; --hand:'Over the Rainbow','Segoe Script','Bradley Hand',cursive;
  --title:'Mea Culpa','Segoe Script',cursive; --serif:'Cormorant SC',Georgia,serif;
  box-sizing:border-box; padding-top:env(safe-area-inset-top,0px); padding-bottom:env(safe-area-inset-bottom,0px);
}
*,*::before,*::after{box-sizing:inherit}
html{height:100%;scroll-padding-top:env(safe-area-inset-top,0px)}
body{
  margin:0;min-height:100%;color:var(--ink);font-family:var(--hand);overflow-x:hidden;position:relative;
  background:
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='3'/%3E%3CfeColorMatrix values='0 0 0 0 .45 0 0 0 0 .3 0 0 0 0 .1 0 0 0 .13 0'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)'/%3E%3C/svg%3E"),
    radial-gradient(ellipse at 50% 30%,#f1dfb0,#e3c88f 70%,#d6b777);
  background-color:#e6cf9b;
}
/* shelf */
.shelf{height:clamp(110px,18vh,190px);position:relative;display:flex;align-items:flex-end;overflow:hidden;
  background:#2a1a12;border-bottom:14px solid #4b2f20;box-shadow:0 3px 0 #1d110b,0 10px 18px rgba(50,30,10,.4)}
.spine{flex:1 0 auto;border-radius:2px 2px 0 0;position:relative;box-shadow:inset -3px 0 4px rgba(0,0,0,.35),inset 2px 0 2px rgba(255,255,255,.12)}
.spine::before,.spine::after{content:"";position:absolute;left:0;right:0;height:3px;background:rgba(235,200,120,.6)}
.spine::before{top:14%}.spine::after{bottom:16%}
/* stacks */
.stack{position:fixed;bottom:0;display:flex;flex-direction:column-reverse;align-items:center;pointer-events:none;z-index:0}
.stack.l{left:-30px}.stack.r{right:-40px}
.vol{height:var(--h);width:var(--w);background:var(--c);border-radius:2px;margin-bottom:-1px;
  box-shadow:inset 0 -5px 0 rgba(255,255,255,.55),inset 0 3px 5px rgba(0,0,0,.35),0 2px 3px rgba(0,0,0,.3);transform:translateX(var(--x))}
/* book */
main{position:relative;z-index:1;display:flex;justify-content:center;padding:clamp(18px,3vh,34px) 18px 40px}
.book{position:relative;width:min(860px,100%);min-height:450px;display:grid;grid-template-columns:1.02fr .98fr;column-gap:clamp(16px,3vw,54px);margin:0 auto;
  border-left:7px solid #b3894b;border-right:7px solid #8c6633;border-radius:4px;
  background:linear-gradient(90deg,var(--paper-edge),var(--paper) 9%,#f8efd6 45%,#efdcab 50%,#f8efd6 55%,var(--paper) 91%,var(--paper-edge));
  box-shadow:0 26px 36px -10px rgba(60,35,10,.45),inset 0 0 40px rgba(150,105,40,.35)}
.book::before{content:"";position:absolute;inset:0;pointer-events:none;border-radius:inherit;
  background:radial-gradient(circle at 78% 18%,rgba(160,110,40,.18),transparent 22%),radial-gradient(circle at 20% 80%,rgba(160,110,40,.14),transparent 25%)}
.book::after{content:"";position:absolute;top:0;bottom:0;left:calc(50% - 14px);width:28px;pointer-events:none;
  background:linear-gradient(90deg,transparent,rgba(90,55,20,.28) 50%,transparent)}
.pg{position:relative;z-index:1;padding:32px 34px 28px;display:flex;flex-direction:column;justify-content:center}
.art{align-items:center;text-align:center;gap:14px}
.art svg{width:min(260px,80%);height:auto;filter:drop-shadow(0 1px 0 rgba(255,255,255,.4))}
.brand{font:700 clamp(1.5rem,3.4vw,1.85rem)/1 var(--serif);color:var(--seal,#5b3a33);margin:0;letter-spacing:.01em}
.view{display:contents}.view[hidden]{display:none}
.view.rev .art{order:2}
h1{font:400 clamp(2.6rem,6vw,3.4rem)/1 var(--title);margin:0 0 10px}
form{display:flex;flex-direction:column}
.f{position:relative;margin-top:18px}
.f input{width:100%;background:none;border:0;border-bottom:1.5px solid var(--ink);border-radius:0;padding:20px 44px 6px 0;font:inherit;font-size:1.05rem;color:var(--ink);outline:none}
.f label{position:absolute;left:0;top:20px;font-size:1.05rem;color:#3a2a22;pointer-events:none;transition:transform .15s,font-size .15s;transform-origin:left}
.f input:focus+label,.f input:not(:placeholder-shown)+label{transform:translateY(-18px);font-size:.82rem}
.f input:focus{border-bottom-width:2.5px}
.f input:focus-visible{box-shadow:0 2px 0 0 rgba(143,45,31,.0)}
.f.bad input{border-color:var(--err)}
.err{min-height:1.15em;margin:3px 0 0;font-size:.82rem;color:var(--err)}
.eye{position:absolute;right:0;top:20px;background:none;border:0;font:inherit;font-size:.8rem;color:var(--sepia);cursor:pointer;padding:0 2px;text-decoration:underline}
.eye:focus-visible,a:focus-visible,.btn:focus-visible,.soc button:focus-visible{outline:2px solid var(--sepia);outline-offset:3px}
.rules{display:flex;flex-wrap:wrap;gap:2px 10px;list-style:none;margin:6px 0 0;padding:0;font-size:.78rem;color:#5a463b}
.rules li::before{content:"○ "}.rules li.ok{color:var(--ok)}.rules li.ok::before{content:"● "}
.row-end{text-align:right;margin-top:6px;font-size:.9rem}
a{color:var(--sepia);text-decoration:none;cursor:pointer}a:hover{text-decoration:underline}
.btn{align-self:center;margin-top:16px;padding:5px 22px;font:inherit;font-size:1rem;background:rgba(255,248,225,.5);color:var(--ink);border:1px solid var(--ink);border-radius:3px;cursor:pointer}
.btn:hover{background:var(--ink);color:#f6ecd0}.btn:disabled{opacity:.55;cursor:wait}
.or{text-align:center;font-size:.85rem;margin:12px 0 8px}
.soc{display:flex;justify-content:center;gap:14px}
.soc button{width:58px;height:34px;border-radius:18px;border:1px solid var(--ink);background:none;cursor:pointer;display:grid;place-items:center;color:var(--ink)}
.soc button:hover{background:rgba(90,58,46,.12)}
.soc svg{width:18px;height:18px;fill:currentColor}
form{display:flex;flex-direction:column}
.swap{margin:22px 0 0;font-size:.92rem}
.swap.c{margin-top:auto;padding-top:18px;text-align:center}
.msg{margin:10px 0 0;padding:6px 10px;font-size:.9rem;background:rgba(255,250,235,.38);border:0;border-radius:4px}
.msg:empty{display:none}
.msg.error{color:var(--err)}.msg.success{color:var(--ok)}.msg.info{color:var(--sepia)}
.has-bg{background:url(assets/background.jpg) center top/auto repeat #e6cf9b}
.shelf.has-img{background:url(assets/shelf.jpg) center bottom/cover no-repeat #2a1a12;border-bottom:0}
.shelf.has-img .spine{display:none}
.stack img{display:block;max-width:none;height:auto}
.book.has-img{width:min(900px,100%);min-height:clamp(450px,65.6vw,590px);background:url(assets/book.png) center/100% 100% no-repeat;border:0;box-shadow:none;filter:drop-shadow(0 18px 18px rgba(60,35,10,.35))}
.book.has-img::before,.book.has-img::after{display:none}
.book.has-img .pg{padding:5.5% 10% 5.5% 15%}.book.has-img .pg+.pg{padding:5.5% 15% 5.5% 10%}
.book.has-img h1{font-size:clamp(2.2rem,5vw,3rem)}.book.has-img .f{margin-top:10px}.book.has-img .swap{margin-top:12px}.book.has-img .or{margin:8px 0 6px}
.book.has-img #f-reg .swap.c{margin-top:34px;padding-top:0;line-height:1;transform:translateY(-4px)}
.seal-img{width:min(260px,80%);height:auto}
@media(max-width:900px){.stack{display:none}}
@media(max-width:620px){
  .book.has-img{min-height:0;background-size:cover}
  .book.has-img .pg,.book.has-img .pg+.pg{padding:26px 24px}
  .book{grid-template-columns:1fr;border-left-width:4px;border-right-width:4px}
  .book::after{display:none}
  .art{padding:22px 20px 6px}.art svg{width:120px}
  .view.rev .art{order:0}
}
@media(prefers-reduced-motion:reduce){*{transition:none!important}}
</style>
</head>
<body>
<header class="shelf" id="shelf" aria-hidden="true"></header>
<div class="stack l" id="sl" aria-hidden="true"></div>
<div class="stack r" id="sr" aria-hidden="true"></div>

<main>
  <div class="book">
    <!-- LOGIN -->
    <section class="view" id="v-login" hidden>
      <div class="pg art"><span class="seal"></span><p class="brand">Libris Arcanun</p></div>
      <div class="pg">
        <h1>Login</h1>
        <form id="f-login" novalidate>
          <div class="f"><input id="l-email" name="email" type="email" autocomplete="email" placeholder=" " required aria-describedby="l-email-e"><label for="l-email">Email</label></div>
          <p class="err" id="l-email-e" aria-live="polite"></p>
          <div class="f"><input id="l-pass" name="password" type="password" autocomplete="current-password" placeholder=" " required aria-describedby="l-pass-e"><label for="l-pass">Password</label><button type="button" class="eye" data-for="l-pass" aria-label="Show password">show</button></div>
          <p class="err" id="l-pass-e" aria-live="polite"></p>
          <div class="row-end"><a id="forgot" role="button" tabindex="0">Forgot Password?</a></div>
          <button class="btn" type="submit">Sign in</button>
          <p class="or">Or Continue With</p>
          <div class="soc">
            <button type="button" data-p="Google" aria-label="Continue with Google"><svg viewBox="0 0 24 24"><path d="M12 10.2v3.9h5.5c-.2 1.3-1.6 3.9-5.5 3.9a6 6 0 1 1 0-12c1.9 0 3.1.8 3.8 1.5l2.6-2.5A9.5 9.5 0 0 0 12 2.5a9.5 9.5 0 1 0 0 19c5.5 0 9.1-3.8 9.1-9.3 0-.6-.1-1.1-.2-1.6z"/></svg></button>
            <button type="button" data-p="GitHub" aria-label="Continue with GitHub"><svg viewBox="0 0 24 24"><path d="M12 .5a11.5 11.5 0 0 0-3.6 22.4c.6.1.8-.3.8-.6v-2c-3.2.7-3.9-1.5-3.9-1.5-.5-1.3-1.3-1.7-1.3-1.7-1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1 1.8 2.7 1.3 3.4 1 .1-.8.4-1.300.7-1.600-2.600-.3-5.300-1.300-5.300-5.700 0-1.300.5-2.300 1.200-3.100-.1-.3-.5-1.500.1-3.100 0 0 1-.3 3.200 1.200a11 11 0 0 1 5.800 0C17.200 5.800 18.200 6.100 18.200 6.100c.6 1.600.2 2.800.1 3.100.8.800 1.200 1.800 1.200 3.100 0 4.400-2.700 5.400-5.300 5.700.4.400.8 1.100.8 2.200v3.200c0 .3.2.7.8.6A11.500 11.500 0 0 0 12 .5z"/></svg></button>
            <button type="button" data-p="Facebook" aria-label="Continue with Facebook"><svg viewBox="0 0 24 24"><path d="M24 12a12 12 0 1 0-13.900 11.900v-8.400H7.100V12h3V9.400c0-3 1.800-4.700 4.500-4.700 1.300 0 2.700.2 2.700.2v3h-1.500c-1.500 0-2 .9-2 1.900V12h3.400l-.5 3.500h-2.900v8.400A12 12 0 0 0 24 12z"/></svg></button>
          </div>
          <div class="msg" id="l-msg" role="status" aria-live="polite"></div>
          <p class="swap">Don't have an account yet? <a href="#/register">Register for free</a></p>
        </form>
      </div>
    </section>

    <!-- REGISTER -->
    <section class="view rev" id="v-register" hidden>
      <div class="pg">
        <h1>Register</h1>
        <form id="f-reg" novalidate>
          <div class="f"><input id="r-name" name="name" type="text" autocomplete="name" placeholder=" " required aria-describedby="r-name-e"><label for="r-name">Full name</label></div>
          <p class="err" id="r-name-e" aria-live="polite"></p>
          <div class="f"><input id="r-email" name="email" type="email" autocomplete="email" placeholder=" " required aria-describedby="r-email-e"><label for="r-email">Email</label></div>
          <p class="err" id="r-email-e" aria-live="polite"></p>
          <div class="f"><input id="r-pass" name="password" type="password" autocomplete="new-password" placeholder=" " required aria-describedby="r-pass-e r-rules"><label for="r-pass">Password</label><button type="button" class="eye" data-for="r-pass" aria-label="Show password">show</button></div>
          <ul class="rules" id="r-rules"><li data-r="len">8+ characters</li><li data-r="low">lowercase</li><li data-r="up">uppercase</li><li data-r="num">number</li><li data-r="sym">symbol</li></ul>
          <p class="err" id="r-pass-e" aria-live="polite"></p>
          <div class="f"><input id="r-conf" name="confirm" type="password" autocomplete="new-password" placeholder=" " required aria-describedby="r-conf-e"><label for="r-conf">Confirm password</label></div>
          <p class="err" id="r-conf-e" aria-live="polite"></p>
          <button class="btn" type="submit">Register</button>
          <div class="msg" id="r-msg" role="status" aria-live="polite"></div>
          <p class="swap c">Have an account? <a href="#/login">Log in here</a></p>
        </form>
      </div>
      <div class="pg art"><span class="seal"></span><p class="brand">Libris Arcanun</p></div>
    </section>
  </div>
</main>

<script>
(function(){
"use strict";
var $=function(s,r){return (r||document).querySelector(s)};
var $$=function(s,r){return Array.prototype.slice.call((r||document).querySelectorAll(s))};

/* ---------- decorative scenery ---------- */
var cols=["#5a3a28","#7a4a2a","#2e3a52","#8a5a3a","#3a2a22","#a0643a","#6b2a2a","#c9a070","#46341f","#b98a52","#26354a","#8b6b4a"];
function rnd(a,b){return a+Math.random()*(b-a)}
var shelf=$("#shelf"),seed=7;
function r(){seed=(seed*9301+49297)%233280;return seed/233280}
for(var x=0;x<window.innerWidth+60;){
  var w=22+r()*34,s=document.createElement("div");
  s.className="spine";s.style.width=w+"px";s.style.height=(70+r()*30)+"%";
  s.style.background="linear-gradient(90deg,rgba(0,0,0,.25),transparent 30%,rgba(255,255,255,.08) 60%,rgba(0,0,0,.3)),"+cols[Math.floor(r()*cols.length)];
  s.style.flex="0 0 "+w+"px";shelf.appendChild(s);x+=w;
}
function stack(el,n){
  for(var i=0;i<n;i++){
    var v=document.createElement("div");v.className="vol";
    v.style.setProperty("--w",(170+r()*80)+"px");v.style.setProperty("--h",(26+r()*18)+"px");
    v.style.setProperty("--c",cols[Math.floor(r()*cols.length)]);v.style.setProperty("--x",(r()*24-12)+"px");
    el.appendChild(v);
  }
}
stack($("#sl"),9);stack($("#sr"),11);
/* ---------- your pictures: drop files into /assets with these names ----------
   background.jpg  page background      shelf.jpg   bookshelf strip (top)
   book.png        open book (blank)    seal.png    LA logo (transparent PNG)
   stack-left.png  left book pile       stack-right.png  right book pile
   Any file that is missing falls back to the built-in CSS/SVG artwork. */
function tryImg(src,ok){var i=new Image();i.onload=function(){ok(i)};i.src=src}
tryImg("assets/background.jpg",function(){document.body.classList.add("has-bg")});
tryImg("assets/shelf.jpg",function(){shelf.classList.add("has-img")});
tryImg("assets/book.png",function(){$(".book").classList.add("has-img")});
[["left","#sl"],["right","#sr"]].forEach(function(a){
  tryImg("assets/stack-"+a[0]+".png",function(i){var el=$(a[1]);el.innerHTML="";i.alt="";el.appendChild(i)})});

/* seal (wavy wax edge, braided ring, monogram) */
function seal(){
  var p="",n=26,i,a,rad;
  for(i=0;i<=360;i+=2){a=i*Math.PI/180;rad=118+5*Math.sin(n*a);p+=(i?"L":"M")+(130+rad*Math.cos(a)).toFixed(1)+" "+(130+rad*Math.sin(a)).toFixed(1)}
  return '<svg class="seal-svg" viewBox="0 0 260 260" role="img" aria-label="Libris Arcanun seal"><path d="'+p+'Z" fill="#fbf3dc" stroke="#5b3a33" stroke-width="3.5"/>'+
  '<circle cx="130" cy="130" r="98" fill="none" stroke="#5b3a33" stroke-width="2"/>'+
  '<circle cx="130" cy="130" r="88" fill="none" stroke="#5b3a33" stroke-width="13" stroke-dasharray="7 3"/>'+
  '<circle cx="130" cy="130" r="88" fill="none" stroke="#fbf3dc" stroke-width="3" stroke-dasharray="3 7"/>'+
  '<circle cx="130" cy="130" r="78" fill="none" stroke="#5b3a33" stroke-width="2"/>'+
  '<text x="130" y="158" text-anchor="middle" font-family="Cormorant SC,Georgia,serif" font-weight="700" font-size="92" fill="#5b3a33" letter-spacing="-8">LA</text></svg>';
}
$$(".seal").forEach(function(e){e.outerHTML=seal()});
tryImg("assets/seal.png",function(i){$$(".seal-svg").forEach(function(sv){
  var im=new Image();im.src=i.src;im.alt="Libris Arcanun seal";im.className="seal-img";sv.replaceWith(im)})});

/* ---------- storage (hashed passwords; demo only) ---------- */
var mem={};
function load(){try{return JSON.parse(localStorage.getItem("la_users")||"{}")}catch(e){return mem}}
function save(u){mem=u;try{localStorage.setItem("la_users",JSON.stringify(u))}catch(e){}}
function sha(t){
  var b=new TextEncoder().encode(t);
  return crypto.subtle.digest("SHA-256",b).then(function(d){return Array.prototype.map.call(new Uint8Array(d),function(x){return x.toString(16).padStart(2,"0")}).join("")});
}

/* ---------- validation ---------- */
var EMAIL=/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/;
var NAME=/^[A-Za-zÀ-ÖØ-öø-ÿ][A-Za-zÀ-ÖØ-öø-ÿ'’.\- ]*$/;
var PR={len:function(v){return v.length>=8&&v.length<=64},low:function(v){return /[a-z]/.test(v)},up:function(v){return /[A-Z]/.test(v)},num:function(v){return /\d/.test(v)},sym:function(v){return /[^A-Za-z0-9\s]/.test(v)}};

var V={
  name:function(v){v=v.trim().replace(/\s+/g," ");
    if(!v)return "Please enter your full name.";
    if(v.length<2)return "Your name must be at least 2 characters.";
    if(v.length>60)return "Your name must be 60 characters or fewer.";
    if(!NAME.test(v))return "Use letters, spaces, hyphens or apostrophes only.";return ""},
  email:function(v){v=v.trim();
    if(!v)return "Please enter your email address.";
    if(v.length>254||!EMAIL.test(v))return "Enter a valid email, like name@example.com.";return ""},
  loginPass:function(v){return v?"":"Please enter your password."},
  pass:function(v){
    if(!v)return "Please create a password.";
    if(/\s/.test(v))return "Password cannot contain spaces.";
    if(!PR.len(v))return v.length<8?"Password must be at least 8 characters.":"Password must be 64 characters or fewer.";
    if(!PR.low(v)||!PR.up(v))return "Add both uppercase and lowercase letters.";
    if(!PR.num(v))return "Add at least one number.";
    if(!PR.sym(v))return "Add at least one symbol, such as ! or #.";return ""},
  conf:function(v,p){
    if(!v)return "Please confirm your password.";
    return v===p?"":"Passwords do not match."}
};

function show(input,msg){
  var f=input.closest(".f"),e=document.getElementById(input.id+"-e");
  e.textContent=msg;f.classList.toggle("bad",!!msg);
  input.setAttribute("aria-invalid",msg?"true":"false");
  return !msg;
}
function msg(id,type,text){var m=document.getElementById(id);m.className="msg "+type;m.textContent=text}
function clear(id){var m=document.getElementById(id);m.className="msg";m.textContent=""}

/* live validation: after first blur, re-check as the user types */
function live(input,fn){
  var touched=false;
  input.addEventListener("blur",function(){touched=true;show(input,fn())});
  input.addEventListener("input",function(){if(touched)show(input,fn())});
  input._touch=function(){touched=true};
}

var lE=$("#l-email"),lP=$("#l-pass"),rN=$("#r-name"),rE=$("#r-email"),rP=$("#r-pass"),rC=$("#r-conf");
live(lE,function(){return V.email(lE.value)});
live(lP,function(){return V.loginPass(lP.value)});
live(rN,function(){return V.name(rN.value)});
live(rE,function(){return V.email(rE.value)});
live(rP,function(){return V.pass(rP.value)});
live(rC,function(){return V.conf(rC.value,rP.value)});
rP.addEventListener("input",function(){
  $$("#r-rules li").forEach(function(li){li.classList.toggle("ok",PR[li.dataset.r](rP.value))});
  if(rC.value)show(rC,V.conf(rC.value,rP.value));
});

/* show / hide password */
$$(".eye").forEach(function(b){b.addEventListener("click",function(){
  var i=document.getElementById(b.dataset.for),h=i.type==="password";
  i.type=h?"text":"password";b.textContent=h?"hide":"show";b.setAttribute("aria-label",(h?"Hide":"Show")+" password");
})});

/* ---------- login ---------- */
$("#f-login").addEventListener("submit",function(ev){
  ev.preventDefault();clear("l-msg");
  var a=show(lE,V.email(lE.value)),b=show(lP,V.loginPass(lP.value));
  if(!a||!b){msg("l-msg","error","Please fix the highlighted fields and try again.");(a?lP:lE).focus();return}
  var email=lE.value.trim().toLowerCase(),btn=$("button[type=submit]",this);btn.disabled=true;
  sha(email+"|"+lP.value).then(function(h){
    var u=load()[email];btn.disabled=false;
    if(u&&u.hash===h){msg("l-msg","success","Welcome back, "+u.name+". The library doors are open.");lP.value="";lP.dispatchEvent(new Event("input"))}
    else msg("l-msg","error","Email or password is incorrect. Check both and try again.");
  });
});
function forgot(){
  clear("l-msg");lE._touch();
  if(!show(lE,V.email(lE.value))){msg("l-msg","info","Enter your email above, then choose Forgot Password again.");lE.focus();return}
  msg("l-msg","success","If an account exists for "+lE.value.trim()+", a reset link is on its way.");
}
$("#forgot").addEventListener("click",forgot);
$("#forgot").addEventListener("keydown",function(e){if(e.key==="Enter"||e.key===" "){e.preventDefault();forgot()}});
$$(".soc button").forEach(function(b){b.addEventListener("click",function(){
  msg("l-msg","info",b.dataset.p+" sign-in isn't connected yet. Use your email and password for now.")})});

/* ---------- register ---------- */
$("#f-reg").addEventListener("submit",function(ev){
  ev.preventDefault();clear("r-msg");
  var ok=[show(rN,V.name(rN.value)),show(rE,V.email(rE.value)),show(rP,V.pass(rP.value)),show(rC,V.conf(rC.value,rP.value))];
  var bad=ok.indexOf(false);
  if(bad>-1){msg("r-msg","error","Please fix the highlighted fields and try again.");[rN,rE,rP,rC][bad].focus();return}
  var name=rN.value.trim().replace(/\s+/g," "),email=rE.value.trim().toLowerCase(),users=load(),btn=$("button[type=submit]",this);
  if(users[email]){show(rE,"An account with this email already exists.");msg("r-msg","error","This email is already registered. Try logging in instead.");rE.focus();return}
  btn.disabled=true;
  sha(email+"|"+rP.value).then(function(h){
    users[email]={name:name,hash:h};save(users);
    msg("r-msg","success","Account created. Taking you to the login page…");
    setTimeout(function(){
      btn.disabled=false;$("#f-reg").reset();$$("#r-rules li").forEach(function(l){l.classList.remove("ok")});
      location.hash="#/login";lE.value=email;lE.dispatchEvent(new Event("input"));
      msg("l-msg","success","Welcome, "+name+". Sign in with your new account.");lP.focus();
    },1400);
  });
});

/* ---------- navigation between pages ---------- */
function route(){
  var reg=location.hash==="#/register";
  $("#v-login").hidden=reg;$("#v-register").hidden=!reg;
  document.title=(reg?"Register":"Login")+" · Libris Arcanun";
  if(reg)clear("r-msg");
  window.scrollTo(0,0);
}
window.addEventListener("hashchange",route);
if(!location.hash)history.replaceState(null,"","#/login");
route();
})();
</script>
</body>
</html>
