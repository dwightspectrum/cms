(()=>{"use strict";var e={123:(e,t,r)=>{var s=r(35);const n={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"},a={success(e){alertify.success(e)},error(e){alertify.error(e)}},o=new class{constructor(e){this.target=e,this.spinner=new s.$(n)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("table-block")),i=document.getElementById("user_form"),c=$("#employed-type-panel");$(".datepicker").datepicker({autoclose:!0,todayHighlight:!0,format:"yyyy-mm-dd"}),document.getElementById("role_id").addEventListener("change",(e=>{let t=e.currentTarget.value;3==t||4==t||5==t||6==t?c.show():c.hide()})),i.addEventListener("submit",(e=>{e.preventDefault(),o.start();const t=new FormData(e.target);$.ajax({type:"POST",url:`${CONFIG.BASE_URL}api/user/edit_details/${CONFIG.user_id}`,dataType:"json",enctype:"multipart/form-data",processData:!1,contentType:!1,cache:!1,data:t,success:function(e){if(!e.success)return a.error("Error!"),void o.stop();o.stop(),a.success("Successfully added!"),setTimeout((function(){window.location.href=CONFIG.BASE_URL+"admin/user/view"}),700)}})}))}},t={};function r(s){if(t[s])return t[s].exports;var n=t[s]={exports:{}};return e[s].call(n.exports,n,n.exports,r),n.exports}r.m=e,r.x=e=>{},r.d=(e,t)=>{for(var s in t)r.o(t,s)&&!r.o(e,s)&&Object.defineProperty(e,s,{enumerable:!0,get:t[s]})},r.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.j=979,(()=>{var e={979:0},t=[[123,216]],s=e=>{},n=(n,a)=>{for(var o,i,[c,l,u,p]=a,d=0,h=[];d<c.length;d++)i=c[d],r.o(e,i)&&e[i]&&h.push(e[i][0]),e[i]=0;for(o in l)r.o(l,o)&&(r.m[o]=l[o]);for(u&&u(r),n&&n(a);h.length;)h.shift()();return p&&t.push.apply(t,p),s()},a=self.webpackChunkqualicare=self.webpackChunkqualicare||[];function o(){for(var s,n=0;n<t.length;n++){for(var a=t[n],o=!0,i=1;i<a.length;i++){var c=a[i];0!==e[c]&&(o=!1)}o&&(t.splice(n--,1),s=r(r.s=a[0]))}return 0===t.length&&(r.x(),r.x=e=>{}),s}a.forEach(n.bind(null,0)),a.push=n.bind(null,a.push.bind(a));var i=r.x;r.x=()=>(r.x=i||(e=>{}),(s=o)())})(),r.x()})();