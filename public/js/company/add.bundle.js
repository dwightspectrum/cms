(()=>{"use strict";var e={3655:(e,t,r)=>{var o=r(6165),n=r(7027),s=r(3438),a=r(5709),c=r(3864);const u={success(e){alertify.success(e)},error(e){alertify.error(e)}};(0,n.R)(document.getElementById("company_form"),"submit").pipe((0,s.b)((e=>e.preventDefault())),(0,a.U)((e=>new FormData(e.target))),(0,a.U)((e=>o.Z.post(`${CONFIG.BASE_URL}api/company/add_details`,{body:e}).json())),(0,c.w)((e=>e))).subscribe((e=>{e.success?(u.success("Successfully added!"),setTimeout((function(){window.location.href=`${CONFIG.BASE_URL}admin/company/view`}),500)):(document.querySelector("company_form").addEventListener("submit",(function(e){e.preventDefault(),alert("Form submitted!")})),document.querySelector("company_form").disabled=!0)}))}},t={};function r(o){if(t[o])return t[o].exports;var n=t[o]={exports:{}};return e[o].call(n.exports,n,n.exports,r),n.exports}r.m=e,r.x=e=>{},r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.j=173,(()=>{var e={173:0},t=[[3655,216]],o=e=>{},n=(n,s)=>{for(var a,c,[u,i,l,p]=s,f=0,d=[];f<u.length;f++)c=u[f],r.o(e,c)&&e[c]&&d.push(e[c][0]),e[c]=0;for(a in i)r.o(i,a)&&(r.m[a]=i[a]);for(l&&l(r),n&&n(s);d.length;)d.shift()();return p&&t.push.apply(t,p),o()},s=self.webpackChunkhotware=self.webpackChunkhotware||[];function a(){for(var o,n=0;n<t.length;n++){for(var s=t[n],a=!0,c=1;c<s.length;c++){var u=s[c];0!==e[u]&&(a=!1)}a&&(t.splice(n--,1),o=r(r.s=s[0]))}return 0===t.length&&(r.x(),r.x=e=>{}),o}s.forEach(n.bind(null,0)),s.push=n.bind(null,s.push.bind(s));var c=r.x;r.x=()=>(r.x=c||(e=>{}),(o=a)())})(),r.x()})();