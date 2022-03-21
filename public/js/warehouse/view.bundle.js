(()=>{"use strict";var e={477:(e,t,r)=>{var n=r(6165),a=r(7027),s=r(3438),o=r(5709),i=r(1035);const c={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"},l={success(e){alertify.success(e)},error(e){alertify.error(e)}};let u={};const d=new class{constructor(e){this.target=e,this.spinner=new i.$(c)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("warehouses")),p=document.getElementById("update-button-panel"),h=document.getElementById("add-warehouse-btn"),y=document.getElementById("submit-update-btn"),g=document.getElementById("cancel-update-btn"),f=document.getElementById("search"),m=document.getElementById("warehouse_form"),w=m.querySelector("#warehouse_name"),b=m.querySelector("#warehouse_location"),v=m.querySelector("#warehouse_country"),E=m.querySelector("#company_id"),_=document.getElementById("warehouse-table"),x=document.getElementById("pagination"),k=n.Z.create({prefixUrl:`${CONFIG.BASE_URL}api/warehouse/`}),B=e=>p.style.display=e?"block":"none",I=e=>h.style.display=e?"block":"none",L=()=>{u={},B(!1),I(!0),m.reset()},j=async(e=1)=>{d.start();let t=new FormData;t.set("page",e),t.set("search",f.value);const r=await(n=t,k.post("get",{body:n}).json());var n,i,c;_.innerHTML=(i=r.list,c=r.read_only,i.length?i.reduce(((e,t)=>`${e}\n                <tr>\n                    <td>${t.warehouse_name}</td>\n                    <td>${t.warehouse_location}</td>\n                    <td align="center">\n                        ${c?"":`<a class="btn btn-sm btn-warning edit-warehouse-btn" data-identifier="${t.warehouse_id}"><span class="fa fa-pencil"></span></a>`}\n                    </td>\n                </tr>`),""):'<tr><td align="center" colspan="7">No records found.</td></tr>'),x.innerHTML=r.pagination||"",((e,t)=>{const r=document.querySelectorAll(".pagination a[href]");r.length&&(0,a.R)(r,"click").pipe((0,s.b)((e=>e.preventDefault())),(0,o.U)((e=>t(e.target.getAttribute("data-ci-pagination-page"))))).subscribe()})(0,j),$(),d.stop()},$=()=>{return e=_.getElementsByClassName("edit-warehouse-btn"),t=e=>{e.preventDefault(),D(e.currentTarget.dataset.identifier),B(!0),I(!1)},Array.from(e).forEach((e=>e.addEventListener("click",t)));var e,t},D=async(e=0)=>{u=await(e=>k.get(`get_by_id/${e}`).json())(e),w.value=u.warehouse_name,b.value=u.warehouse_location,v.value=u.warehouse_country,E.value=u.company_id};j(),f.addEventListener("keyup",(()=>j())),m.addEventListener("submit",(async e=>{e.preventDefault();try{await(t=new FormData(m),k.post("add_details",{body:t}).json()),l.success("Successfully added!"),L(),j()}catch(e){l.error("Error!")}var t})),y.addEventListener("click",(async e=>{e.preventDefault();try{await(t=u.warehouse_id,r=new FormData(m),k.post(`update_details/${t}`,{body:r}).json()),l.success("Successfully updated!"),L(),j()}catch(e){l.error("Error!")}var t,r})),g.addEventListener("click",(e=>{e.preventDefault(),L()}))}},t={};function r(n){if(t[n])return t[n].exports;var a=t[n]={exports:{}};return e[n].call(a.exports,a,a.exports,r),a.exports}r.m=e,r.x=e=>{},r.d=(e,t)=>{for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.j=784,(()=>{var e={784:0},t=[[477,216]],n=e=>{},a=(a,s)=>{for(var o,i,[c,l,u,d]=s,p=0,h=[];p<c.length;p++)i=c[p],r.o(e,i)&&e[i]&&h.push(e[i][0]),e[i]=0;for(o in l)r.o(l,o)&&(r.m[o]=l[o]);for(u&&u(r),a&&a(s);h.length;)h.shift()();return d&&t.push.apply(t,d),n()},s=self.webpackChunkhotware=self.webpackChunkhotware||[];function o(){for(var n,a=0;a<t.length;a++){for(var s=t[a],o=!0,i=1;i<s.length;i++){var c=s[i];0!==e[c]&&(o=!1)}o&&(t.splice(a--,1),n=r(r.s=s[0]))}return 0===t.length&&(r.x(),r.x=e=>{}),n}s.forEach(a.bind(null,0)),s.push=a.bind(null,s.push.bind(s));var i=r.x;r.x=()=>(r.x=i||(e=>{}),(n=o)())})(),r.x()})();