(()=>{"use strict";var e={3417:(e,t,n)=>{var a=n(6165),r=n(6455),s=n.n(r),i=n(1035);const l={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"};var o=n(7027),d=n(3438),c=n(5709);const p={success(e){alertify.success(e)},error(e){alertify.error(e)}},u=new class{constructor(e){this.target=e,this.spinner=new i.$(l)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("loadings")),f=a.Z.create({prefixUrl:`${CONFIG.BASE_URL}api/loading/`}),g=document.getElementById("search"),h=document.getElementById("loading-table"),b=document.getElementById("pagination");let w=1;async function m(e=1){u.start(),w=e;let t=g.value||"",n=new FormData;n.set("search",t);const a=await f.post("get",{body:n}).json();let r=(s=a.list).length?s.reduce(((e,t)=>`${e}\n            <tr>\n                <td>${t.loading_description}</td>\n                <td>${t.loading_furnace}</td>\n                <td>${t.loading_type_of_unit}</td>\n                <td>${t.loading_work}</td>\n                <td align="center">${t.user_firstname+" "+t.user_lastname}</td>\n                <td align="center">\n                    <div class="btn-group">\n                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-cog fa-spin m-r-5"></i> <span class="caret"></span></button>\n                        <ul role="menu" class="dropdown-menu dropdown-menu-right">\n                            <li><a href="${CONFIG.BASE_URL}equipment/loading/details/${t.loading_id}" title="View Details"><span class="fa fa-search"></span>&nbsp; View</a></li>\n                            <li><a href="${CONFIG.BASE_URL}equipment/loading/edit/${t.loading_id}" title="Update"><span class="fa fa-pencil"></span>&nbsp; Update</a></li>\n                            <li><a href="" class="delete-loading-btn" title="Delete" data-index="${t.loading_id}" data-name="${t.loading_description}"><span class="fa fa-trash"></span>&nbsp; Delete</a></li>\n                            <li class="divider"></li>\n                            <li><a href="${CONFIG.BASE_URL}api/loading/preview_pdf/${t.loading_id}" target="_blank" title="Preview"><span class="fa fa-search-plus"></span>&nbsp; Preview</a></li>\n                            <li><a href="${CONFIG.BASE_URL}api/loading/save_as_pdf/${t.loading_id}" target="_blank" title="Download Pdf"><span class="fa fa-file-pdf-o"></span>&nbsp; Save as Pdf</a></li>\n                        </ul>\n                    </div>\n                </td>\n            </tr>`),""):'<tr><td align="center" colspan="6">No records found.</td></tr>';var s,i;h.innerHTML=r,b.innerHTML=a.pagination,((e,t)=>{const n=document.querySelectorAll("undefined a[href]");n.length&&(0,o.R)(n,"click").pipe((0,d.b)((e=>e.preventDefault())),(0,c.U)((e=>undefined(e.target.getAttribute("data-ci-pagination-page"))))).subscribe()})(),i=h.getElementsByClassName("delete-loading-btn"),Array.from(i).forEach((function(e){e.addEventListener("click",v)})),u.stop()}function v(e){var t,n;e.preventDefault(),t=e.target.dataset.index,n=e.target.dataset.name,s().fire({title:"Are you sure?",html:`Are you sure you want to delete ${n}?`,icon:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Yes",allowOutsideClick:!0,reverseButtons:!0}).then((async e=>{e.value&&((await f.get(`delete/${t}`).json()).success?(p.success("Successfully deleted."),m(w)):p.error("Error."))}))}m(),g.addEventListener("keyup",(()=>m()))}},t={};function n(a){if(t[a])return t[a].exports;var r=t[a]={exports:{}};return e[a].call(r.exports,r,r.exports,n),r.exports}n.m=e,n.x=e=>{},n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var a in t)n.o(t,a)&&!n.o(e,a)&&Object.defineProperty(e,a,{enumerable:!0,get:t[a]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),n.j=798,(()=>{var e={798:0},t=[[3417,216]],a=e=>{},r=(r,s)=>{for(var i,l,[o,d,c,p]=s,u=0,f=[];u<o.length;u++)l=o[u],n.o(e,l)&&e[l]&&f.push(e[l][0]),e[l]=0;for(i in d)n.o(d,i)&&(n.m[i]=d[i]);for(c&&c(n),r&&r(s);f.length;)f.shift()();return p&&t.push.apply(t,p),a()},s=self.webpackChunkhotware=self.webpackChunkhotware||[];function i(){for(var a,r=0;r<t.length;r++){for(var s=t[r],i=!0,l=1;l<s.length;l++){var o=s[l];0!==e[o]&&(i=!1)}i&&(t.splice(r--,1),a=n(n.s=s[0]))}return 0===t.length&&(n.x(),n.x=e=>{}),a}s.forEach(r.bind(null,0)),s.push=r.bind(null,s.push.bind(s));var l=n.x;n.x=()=>(n.x=l||(e=>{}),(a=i)())})(),n.x()})();