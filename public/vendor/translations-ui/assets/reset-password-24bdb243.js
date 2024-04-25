import{_ as y}from"./layout-guest-8ff3f210.js";import{_ as b}from"./base-button.vue_vue_type_script_setup_true_lang-3d6cef8e.js";import{_ as v}from"./input-password.vue_vue_type_script_setup_true_lang-c432caf8.js";import{_ as V,a as h}from"./input-label.vue_vue_type_script_setup_true_lang-b020cb97.js";import{d as P,T as x,o as C,c as k,w as t,a as d,b as o,f as r,t as B,u as e,g as N,Z as $}from"./app-8d2ddf0a.js";import"./logo-47b5a18d.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./input-text.vue_vue_type_script_setup_true_lang-c368a274.js";import"./use-input-size-a5ed2a71.js";import"./icon-close-2c219153.js";const E={class:"space-y-1 opacity-45"},I=["textContent"],R={class:"space-y-1"},q={class:"space-y-1"},Z=P({__name:"reset-password",props:{email:{},token:{}},setup(c){const p=c,s=x({token:p.token,email:p.email,password:"",password_confirmation:""}),u=()=>{s.post(route("ltu.password.update"),{onFinish:()=>{s.reset("password","password_confirmation")}})};return(_,a)=>{const w=$,n=V,i=h,m=v,f=b,g=y;return C(),k(g,null,{title:t(()=>[d(" Reset Password ")]),subtitle:t(()=>[d(" Ensure your new password is at least 8 characters long to ensure security. ")]),default:t(()=>[o(w,{title:"Reset Password"}),r("form",{class:"space-y-6",onSubmit:N(u,["prevent"])},[r("div",E,[o(n,{for:"email",value:"Email Address",class:"sr-only"}),r("div",{class:"w-full cursor-not-allowed rounded-md border border-gray-300 bg-gray-100 px-2 py-2.5 text-sm",textContent:B(_.email)},null,8,I),o(i,{message:e(s).errors.email},null,8,["message"])]),r("div",R,[o(n,{for:"password",value:"Password",class:"sr-only"}),o(m,{id:"password",modelValue:e(s).password,"onUpdate:modelValue":a[0]||(a[0]=l=>e(s).password=l),error:e(s).errors.password,required:"",autocomplete:"new-password",placeholder:"New Password",class:"bg-gray-50"},null,8,["modelValue","error"]),o(i,{message:e(s).errors.password},null,8,["message"])]),r("div",q,[o(n,{for:"password_confirmation",value:"Confirm Password",class:"sr-only"}),o(m,{id:"password_confirmation",modelValue:e(s).password_confirmation,"onUpdate:modelValue":a[1]||(a[1]=l=>e(s).password_confirmation=l),error:e(s).errors.password_confirmation,required:"",autocomplete:"new-password",placeholder:"Confirm Password",class:"bg-gray-50"},null,8,["modelValue","error"]),o(i,{message:e(s).errors.password_confirmation},null,8,["message"])]),o(f,{type:"submit",variant:"secondary","is-loading":e(s).processing,"full-width":""},{default:t(()=>[d(" Reset Password ")]),_:1},8,["is-loading"])],32)]),_:1})}}});export{Z as default};
