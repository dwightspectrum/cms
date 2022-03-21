(()=>{"use strict";var e={2462:(e,t,n)=>{var s=n(6165),a=n(7027),r=n(3438),o=n(5709),i=n(1035);const l={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"},c={success(e){alertify.success(e)},error(e){alertify.error(e)}},p=new class{constructor(e){this.target=e,this.spinner=new i.$(l)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("expenses")),d=s.Z.create({prefixUrl:`${CONFIG.BASE_URL}api/expense/`});let u=1;async function f(e=1){p.start();let t=document.getElementById("search").value;u=e;const n=new FormData;n.set("page",e),n.set("search",t);const s=await d.post("get",{body:n}).json();let i='<tr><td align="center" colspan="6">No records found.</td></tr>';s.list.length&&(i=s.list.reduce(((e,t)=>`${e}\n                     <tr>\n                        <td class="text-center">${t.expense_name}</td>\n                        <td class="text-justify">${t.expense_description}</td>\n                        <td class="text-center">\n                            ${t.user_lastname?`${t.user_lastname}, ${t.user_firstname}`:"No assigned user."}\n                        </td>\n                        <td class="text-center">${t.expense_date}</td>\n                        <td class="text-center">${t.expense_price}</td>\n                        <td class="text-center">\n                            <div class="btn-group">\n                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-cog fa-spin m-r-5"></i> <span class="caret"></span></button>\n                                <ul role="menu" class="dropdown-menu dropdown-menu-right">${function({expense_id:e,expense_name:t,expense_description:n,expense_date:s,expense_price:a,expense_file:r}){return`<li><a href="${CONFIG.BASE_URL}reporting/expense/edit/${e}" title="Update"><span class="fa fa-pencil"></span>&nbsp; Update</a></li>\n        <li><a href="" class="delete-expense-btn" title="Delete" data-index="${e}" data-name="${t}"><span class="fa fa-trash"></span>&nbsp; Delete</a></li>\n        \n        ${r?`<li class="divider"></li>\n            <li>\n                <a href="${CONFIG.BASE_URL}expense/preview_attachment/${e}" title="Preview Attachment" target="_blank"><span class="fa fa-paperclip"></span>&nbsp; Preview</a>\n                <a href="${CONFIG.BASE_URL}expense/download_attachment/${e}" title="Download Attachment"><span class="fa fa-download"></span>&nbsp; Download Attachment</a>\n            </li>`:""}`}(t)}</ul>\n                            </div>\n                        </td>\n                    </tr>`),"")),document.getElementById("expense-table").innerHTML=i,document.getElementById("pagination").innerHTML=s.pagination,((e,t)=>{const n=document.querySelectorAll(".pagination a[href]");n.length&&(0,a.R)(n,"click").pipe((0,r.b)((e=>e.preventDefault())),(0,o.U)((e=>t(e.target.getAttribute("data-ci-pagination-page"))))).subscribe()})(0,f),h(),p.stop()}f(u),document.getElementById("search").addEventListener("keyup",(()=>{f(u)}));const h=()=>{let e=document.getElementsByClassName("delete-expense-btn");Array.from(e).forEach((function(e){e.addEventListener("click",(function(e){e.preventDefault();let t=$(this).data("index"),n=$(this).data("name");Swal.fire({title:"Are you sure?",html:`Are you sure you want to delete ${n}? <br> You won't be able to revert this.`,icon:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Yes",allowOutsideClick:!0,reverseButtons:!0}).then((async e=>{if(e.value){const e=await d.get(`delete/${t}`).json();e.success?(c.success("Successfully deleted!"),f(u)):c.error(e.message)}}))}))}))}}},t={};function n(s){if(t[s])return t[s].exports;var a=t[s]={exports:{}};return e[s].call(a.exports,a,a.exports,n),a.exports}n.m=e,n.x=e=>{},n.d=(e,t)=>{for(var s in t)n.o(t,s)&&!n.o(e,s)&&Object.defineProperty(e,s,{enumerable:!0,get:t[s]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),n.j=584,(()=>{var e={584:0},t=[[2462,216]],s=e=>{},a=(a,r)=>{for(var o,i,[l,c,p,d]=r,u=0,f=[];u<l.length;u++)i=l[u],n.o(e,i)&&e[i]&&f.push(e[i][0]),e[i]=0;for(o in c)n.o(c,o)&&(n.m[o]=c[o]);for(p&&p(n),a&&a(r);f.length;)f.shift()();return d&&t.push.apply(t,d),s()},r=self.webpackChunkhotware=self.webpackChunkhotware||[];function o(){for(var s,a=0;a<t.length;a++){for(var r=t[a],o=!0,i=1;i<r.length;i++){var l=r[i];0!==e[l]&&(o=!1)}o&&(t.splice(a--,1),s=n(n.s=r[0]))}return 0===t.length&&(n.x(),n.x=e=>{}),s}r.forEach(a.bind(null,0)),r.push=a.bind(null,r.push.bind(r));var i=n.x;n.x=()=>(n.x=i||(e=>{}),(s=o)())})(),n.x()})();