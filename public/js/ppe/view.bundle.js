(()=>{"use strict";var e={3627:(e,t,n)=>{var r=n(6165),s=n(6455),a=n.n(s),o=n(7484),i=n.n(o),u=n(178),l=n.n(u),c=n(9387),d=n.n(c),p=n(1035);const m={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"};var f=n(7027),h=n(3438),g=n(5709);const y={success(e){alertify.success(e)},error(e){alertify.error(e)}};i().extend(l()),i().extend(d());const b=new class{constructor(e){this.target=e,this.spinner=new p.$(m)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("ppe-claimed")),v=document.getElementById("search"),w=document.getElementById("warehouse_filter"),_=document.getElementById("ppe-claimed-table"),x=document.getElementById("pagination"),B=r.Z.create({prefixUrl:`${CONFIG.BASE_URL}api/ppe/`});let E=[];async function C(e=1){b.start();let t=new FormData;t.set("search",v.value||""),t.set("page",e),t.set("warehouse_id",w.value||0);const n=await(r=t,B.post("get",{body:r}).json());var r,s;_.innerHTML=(s=n.list).length?(E=s,s.reduce(((e,t)=>`${e}\n            <tr>\n                <td>${t.user_fullname}</td>\n                <td>\n                    <span class="font-medium">${t.item_name}</span>\n                    <br/>\n                    <span class="text-muted">\n                        ${t.serial_number}\n                    </span>\n                </td>\n                <td>\n                    <span class="font-medium">${t.warehouse_name}</span>\n                    <br/>\n                    <span class="text-muted">\n                        ${t.warehouse_location}\n                    </span>\n                </td>\n                <td align="center">${t.ipr_quantity}</td>\n                <td align="center">${t.added_date}</td>\n                <td align="center">\n                    ${"active"==t.ipr_status.toLowerCase()?'<span class="label label-success">CLAIMED</span>':"returned"==t.ipr_status.toLowerCase()?`<span class="label label-danger" title="Returned at ${t.updated_date}">RETURNED</span>`:""}\n                </td>\n                <td>\n                    ${"active"==t.ipr_status.toLowerCase()?`<a class="btn btn-danger btn-sm return-ppe-btn" data-identifier="${t.ipr_id}"><i class="fa fa-reply"></i> &nbsp;Return</a>`:""}\n                </td>\n            </tr>`),"")):'<tr><td align="center" colspan="7">No records found.</td></tr>',x.innerHTML=n.pagination,((e,t)=>{const n=document.querySelectorAll(".pagination a[href]");n.length&&(0,f.R)(n,"click").pipe((0,h.b)((e=>e.preventDefault())),(0,g.U)((e=>t(e.target.getAttribute("data-ci-pagination-page"))))).subscribe()})(0,C),Array.from(document.getElementsByClassName("return-ppe-btn")).forEach((e=>{e.addEventListener("click",(function(e){e.preventDefault();const t=e.currentTarget.dataset.identifier,n=E.find((e=>e.ipr_id==t));var r,s;Number(n.ipr_quantity)>1?async function(e,t,n){const{value:r}=await a().fire({title:"Are you sure?",html:`Are you sure you want to return ${t}?  Please enter the amount of quantity to return.`,icon:"question",input:"number",confirmButtonColor:"#DD6B55",confirmButtonText:"Submit",inputValue:n,showCancelButton:!0,reverseButtons:!0,inputValidator:e=>e?e>n||e<1?"Please enter a valid quantity.":void 0:"Please enter a quantity."});if(r){let t=new FormData;t.set("timezone",i().tz.guess()),t.set("quantity",r);const n=await((e,t)=>B.post(`returnItems/${e}`,{body:t}).json())(e,t);if(!n.success)return void y.error(n.message);y.success("Successfully returned."),C()}}(n.ipr_id,n.serial_number,n.ipr_quantity):1==Number(n.ipr_quantity)?(r=n.ipr_id,s=n.serial_number,a().fire({title:"Are you sure?",html:`Are you sure you want to return ${s}?`,icon:"question",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Yes",allowOutsideClick:!0,reverseButtons:!0}).then((async e=>{if(!e.value)return;let t=new FormData;t.set("timezone",i().tz.guess());const n=await((e,t)=>B.post(`returnItem/${e}`,{body:t}).json())(r,t);n.success?(y.success("Successfully returned."),C()):y.error(n.message)}))):y.error("Error. Nothing to return.")}))})),b.stop()}$(".select2").select2(),C(),v.addEventListener("keyup",(()=>C())),$("#warehouse_filter").on("change",(()=>C())),document.getElementById("export-pdf-form").addEventListener("submit",(function(e){e.preventDefault(),this.action=`${CONFIG.BASE_URL}api/ppe/exportList`,this.pdf_search_filter.value=document.getElementById("search").value,this.pdf_warehouse_filter.value=document.getElementById("warehouse_filter").value||0,this.submit()}))}},t={};function n(r){if(t[r])return t[r].exports;var s=t[r]={exports:{}};return e[r].call(s.exports,s,s.exports,n),s.exports}n.m=e,n.x=e=>{},n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),n.j=20,(()=>{var e={20:0},t=[[3627,216]],r=e=>{},s=(s,a)=>{for(var o,i,[u,l,c,d]=a,p=0,m=[];p<u.length;p++)i=u[p],n.o(e,i)&&e[i]&&m.push(e[i][0]),e[i]=0;for(o in l)n.o(l,o)&&(n.m[o]=l[o]);for(c&&c(n),s&&s(a);m.length;)m.shift()();return d&&t.push.apply(t,d),r()},a=self.webpackChunkhotware=self.webpackChunkhotware||[];function o(){for(var r,s=0;s<t.length;s++){for(var a=t[s],o=!0,i=1;i<a.length;i++){var u=a[i];0!==e[u]&&(o=!1)}o&&(t.splice(s--,1),r=n(n.s=a[0]))}return 0===t.length&&(n.x(),n.x=e=>{}),r}a.forEach(s.bind(null,0)),a.push=s.bind(null,a.push.bind(a));var i=n.x;n.x=()=>(n.x=i||(e=>{}),(r=o)())})(),n.x()})();