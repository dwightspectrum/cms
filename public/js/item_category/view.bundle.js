(()=>{"use strict";var e={4322:(e,t,n)=>{var r=n(6165),a=n(1035);const o={lines:10,length:0,width:12,radius:16,scale:1,corners:1,speed:1,rotate:0,animation:"spinner-line-shrink",direction:1,color:"#e74c3c",fadeColor:"transparent",top:"50%",left:"50%",shadow:"0 0 1px transparent",zIndex:2e9,className:"spinner",position:"absolute"};var i=n(7027),s=n(3438),c=n(5709);const l={success(e){alertify.success(e)},error(e){alertify.error(e)}};let u=1;const p=new class{constructor(e){this.target=e,this.spinner=new a.$(o)}start(){this.spinner.spin(this.target),this.target.classList.add("opaque")}stop(){this.spinner.stop(),this.target.classList.remove("opaque")}}(document.getElementById("categories")),d=document.getElementById("search"),g=document.getElementById("add_equipment_category"),m=document.getElementById("pdf-form");async function f(){const e=(await r.Z.get(`${CONFIG.BASE_URL}itemmaincategory/get_all_main_categories`).json()).reduce((function(e,t){return`${e}\n                <option value="${t.item_main_category_id}">\n                    ${t.item_main_category_name}\n                </option>`}),"");document.querySelector("#add_equipment_category #item_main_category_id").innerHTML=e,$("#add_equipment_category .select2").select2()}async function y(e=1){p.start(),u=e;let t=new FormData;t.set("page",e),t.set("search",d.value||"");const n=await r.Z.post(`${CONFIG.BASE_URL}itemcategory/get`,{body:t}).json();n.list.length?($("#category-table").loadTemplate($("#category-row-template"),n.list),$("#pagination").html(n.pagination),((e,t)=>{const n=document.querySelectorAll("#pagination a[href]");n.length&&(0,i.R)(n,"click").pipe((0,s.b)((e=>e.preventDefault())),(0,c.U)((e=>t(e.target.getAttribute("data-ci-pagination-page"))))).subscribe()})(0,y),n.read_only||$("#categories").Tabledit({url:CONFIG.BASE_URL+"itemcategory/update",hideIdentifier:!0,columns:{identifier:[0,"item_category_id"],editable:[[2,"item_category_name"],[3,"item_category_description"]]},buttons:{edit:{class:"btn btn-warning m-r-5",style:"margin-right: 2px",html:'<i class="fa fa-pencil"></i>',action:"EDIT"},delete:{class:"btn btn-danger",html:'<i class="fa fa-trash"></i>',action:"DELETE"}},onDraw:function(){},onSuccess:function(e,t,n){e.success?(l.success(e.message),"DELETE"==e.action&&y(u)):l.error(e.message)},onFail:function(e,t,n){console.log("onFail(jqXHR, textStatus, errorThrown)"),console.log(e),console.log(t),console.log(n)},onAjax:function(e,t,n){if("EDIT"===e){var r=(s=t,JSON.parse('{"'+decodeURIComponent(s.replace(/&/g,'","').replace(/=/g,'":"'))+'"}')),a=!1,o="",i="";return h(r.item_category_name)?(a=!0,o="Name is required.",i="item_category_name"):h(r.item_category_description)&&(a=!0,o="Description is required.",i="item_category_description"),$('input[name="'+i+'"]').focus(),h(o)||l.error(o),!a}var s;return!0}})):$("#category-table").html('<tr><td align="center" colspan="5">No records found.</td></tr>'),p.stop()}function h(e){return!e||!e.trim()||0===e.length}(e=>{let t=document.getElementById(e).options,n=Array.from(t).map((e=>({id:e.value,text:e.innerHTML})));$.fn.select2.amd.require(["select2/data/array","select2/utils"],(function(t,r){function a(e,t){a.__super__.constructor.call(this,e,t)}r.Extend(a,t),a.prototype.query=function(e,t){var r=[];r=e.term&&""!==e.term?n.filter((function(t){return t.text.toUpperCase().indexOf(e.term.toUpperCase())>=0})):n,"page"in e||(e.page=1);var a={};a.results=r.slice(10*(e.page-1),10*e.page),a.pagination={},a.pagination.more=10*e.page<r.length,t(a)},$(document).ready((function(){$(`#${e}.select2`).select2({ajax:{},dataAdapter:a})}))}))})("item_main_category_id"),y(),f(),d.addEventListener("keyup",(()=>y())),g.addEventListener("submit",(async e=>{e.preventDefault();const t=new FormData(g);(await r.Z.post(`${CONFIG.BASE_URL}itemcategory/add_details`,{body:t}).json()).success?l.success("Successfully added!"):l.error("Error!"),g.reset(),f(),y(u)})),m.addEventListener("submit",(e=>{e.preventDefault(),e.action=CONFIG.BASE_URL+"itemcategory/pdf",e.pdf_search.value=$("#search").val(),e.submit()}))}},t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={exports:{}};return e[r].call(a.exports,a,a.exports,n),a.exports}n.m=e,n.x=e=>{},n.d=(e,t)=>{for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),n.j=573,(()=>{var e={573:0},t=[[4322,216]],r=e=>{},a=(a,o)=>{for(var i,s,[c,l,u,p]=o,d=0,g=[];d<c.length;d++)s=c[d],n.o(e,s)&&e[s]&&g.push(e[s][0]),e[s]=0;for(i in l)n.o(l,i)&&(n.m[i]=l[i]);for(u&&u(n),a&&a(o);g.length;)g.shift()();return p&&t.push.apply(t,p),r()},o=self.webpackChunkhotware=self.webpackChunkhotware||[];function i(){for(var r,a=0;a<t.length;a++){for(var o=t[a],i=!0,s=1;s<o.length;s++){var c=o[s];0!==e[c]&&(i=!1)}i&&(t.splice(a--,1),r=n(n.s=o[0]))}return 0===t.length&&(n.x(),n.x=e=>{}),r}o.forEach(a.bind(null,0)),o.push=a.bind(null,o.push.bind(o));var s=n.x;n.x=()=>(n.x=s||(e=>{}),(r=i)())})(),n.x()})();