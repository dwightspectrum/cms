(()=>{"use strict";var t={6570:(t,e,n)=>{var r=n(6165),s=(n(6455),n(1035));const a={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"};var o=n(7027),i=n(3438),c=n(5709);const d=new class{constructor(t){this.target=t,this.spinner=new s.$(a)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("projects")),l=r.Z.create({prefixUrl:`${CONFIG.BASE_URL}api/project/`}),p=document.getElementById("search");let u=1;async function g(t=1){d.start(),u=t;let e=p.value||"",n=new FormData;n.set("page",t),n.set("search",e);const r=await l.post("get_my_projects",{body:n}).json(),s=(a=r.list).length?a.reduce(((t,e)=>`${t}\n                <tr>\n                    <td>${e.project_number}</td>\n                    <td>${e.project_name}</td>\n                    <td>${e.project_po_number}</td>\n                    <td>\n                        <span class="font-medium">${e.cms_name}</span>\n                        <br/>\n                        <span class="text-muted">\n                            ${e.cms_address_building?e.cms_address_building+", ":""}\n                            ${e.cms_address_street?e.cms_address_street+", ":""}\n                            ${e.cms_address_city?e.cms_address_city+", ":""}\n                            ${e.cms_address_country?e.cms_address_country:""}\n                        </span>\n                    </td>\n                    <td align="center">${e.project_man_power}</td>\n                    <td align="center">${e.added_by}</td>\n                    <td align="center">${function(t){if("active"==t)return'<label class="label label-success">ACTIVE</label>'}(e.project_status)}</td>\n                    <td align="center">\n                        <div class="btn-group">\n                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-cog m-r-5"></i> <span class="caret"></span></button>\n                            <ul role="menu" class="dropdown-menu dropdown-menu-right">\n                                <li><a href="${CONFIG.BASE_URL}project/preview/${e.project_id}" title="View Details"><span class="fa fa-search"></span>&nbsp; View</a></li>\n                            </ul>\n                        </div>\n                    </td>\n                </tr>`),""):'<tr><td align="center" colspan="9">No records found.</td></tr>';var a;document.getElementById("project-table").innerHTML=s,document.getElementById("pagination").innerHTML=r.pagination,((t,e)=>{const n=document.querySelectorAll(".pagination a[href]");n.length&&(0,o.R)(n,"click").pipe((0,i.b)((t=>t.preventDefault())),(0,c.U)((t=>e(t.target.getAttribute("data-ci-pagination-page"))))).subscribe()})(0,g),d.stop()}g(),p.addEventListener("keyup",(function(){g()}))}},e={};function n(r){if(e[r])return e[r].exports;var s=e[r]={exports:{}};return t[r].call(s.exports,s,s.exports,n),s.exports}n.m=t,n.x=t=>{},n.d=(t,e)=>{for(var r in e)n.o(e,r)&&!n.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:e[r]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"==typeof window)return window}}(),n.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),n.j=574,(()=>{var t={574:0},e=[[6570,216]],r=t=>{},s=(s,a)=>{for(var o,i,[c,d,l,p]=a,u=0,g=[];u<c.length;u++)i=c[u],n.o(t,i)&&t[i]&&g.push(t[i][0]),t[i]=0;for(o in d)n.o(d,o)&&(n.m[o]=d[o]);for(l&&l(n),s&&s(a);g.length;)g.shift()();return p&&e.push.apply(e,p),r()},a=self.webpackChunkhotware=self.webpackChunkhotware||[];function o(){for(var r,s=0;s<e.length;s++){for(var a=e[s],o=!0,i=1;i<a.length;i++){var c=a[i];0!==t[c]&&(o=!1)}o&&(e.splice(s--,1),r=n(n.s=a[0]))}return 0===e.length&&(n.x(),n.x=t=>{}),r}a.forEach(s.bind(null,0)),a.push=s.bind(null,a.push.bind(a));var i=n.x;n.x=()=>(n.x=i||(t=>{}),(r=o)())})(),n.x()})();