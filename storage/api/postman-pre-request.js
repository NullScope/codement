pm.sendRequest({
  url: 'http://localhost:8000/sanctum/csrf-cookie',
  method: 'GET',
}, function (error, response, { cookies }) {
  if (!error) {
      pm.environment.set('xsrf-cookie', cookies.get('XSRF-TOKEN'));
      pm.request.headers.add({ key: 'X-XSRF-TOKEN', value: cookies.get('XSRF-TOKEN') });
      pm.request.headers.add({ key: 'Accept', value: 'application/json' });
      pm.request.headers.add({ key: 'Referer', value: 'localhost:8000' });
  }
});
