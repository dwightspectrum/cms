!async function(){const t=await fetch("https://api-m.sandbox.paypal.com/v1/oauth2/token",{method:"post",headers:new Headers({"Content-Type":"application/json",Authorization:"Basic "+btoa("ARADErD9XmySp_4QcTPxFxOZLQYEWYUJxfCCc6rmGrOjsGJPqLwOMVSeFOW4bD7GAZ7danggHTkKvmFi:EFjdX5hV0_P_tTQm2KRMrBsu16_Loo8WymUtelv7c2qqzmC5Ehf67Ms3Ug7Tm7uXNVrGJy1KVyNlfGWS")}),body:"grant_type=client_credentials"}),{access_token:a}=await t.json();console.log(a),paypal.Buttons().render("#paypal-button")}();