(function(){
var sb=document.getElementById('rzSb'),tog=document.getElementById('rzTog'),bk=document.getElementById('rzBk'),ham=document.getElementById('rzHam');
if(!sb)return;
var mob=function(){return window.innerWidth<=820;};
var p=window.location.pathname.replace(/^\/|\/$/g,'');
document.querySelectorAll('.rz-sb__a[data-p]').forEach(function(el){if(p===el.getAttribute('data-p')||p.indexOf(el.getAttribute('data-p'))===0)el.classList.add('act');});
function setOff(){if(mob())return;if(sb.classList.contains('open')){document.documentElement.classList.add('rz-sb-open');}else{document.documentElement.classList.remove('rz-sb-open');}}
if(!mob()){var sw=sb.parentElement;sw.addEventListener('mouseenter',function(){document.documentElement.classList.add('rz-sb-open');});sw.addEventListener('mouseleave',function(){if(!sb.classList.contains('open'))document.documentElement.classList.remove('rz-sb-open');});}
if(tog)tog.addEventListener('click',function(e){e.stopPropagation();sb.classList.toggle('open');setOff();});
if(ham)ham.addEventListener('click',function(){sb.classList.add('open');bk.classList.add('vis');});
if(bk)bk.addEventListener('click',function(){sb.classList.remove('open');bk.classList.remove('vis');});
var st=sessionStorage.getItem('rzSb');if(st==='1'&&!mob())sb.classList.add('open');
setOff();
sb.addEventListener('transitionend',function(){if(!mob()){sessionStorage.setItem('rzSb',sb.classList.contains('open')?'1':'0');setOff();}});
})();