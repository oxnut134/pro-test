const stripe = require('stripe')('sk_test'); // 秘密鍵を使用

stripe.accounts.retrieve()
  .then((account) => {
      console.log(`Country: ${account.country}`); // アカウントの国情報をコンソールに出力
  })
  .catch((error) => {
      console.error('Error retrieving account:', error.message); // エラーがあれば表示
  });
