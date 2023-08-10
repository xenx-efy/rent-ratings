const useFetch = (
  method: 'GET' | 'PUT' | 'POST' | 'PATCH' | 'DELETE',
  url: string,
  body?: any,
  params?: {
    mode?: RequestMode,
    headers?: {
      Accept?: string,
      Authorization?: string,
      'Content-Type'?: string
    },
    signal?: AbortSignal
  },
) => {
  const {
    headers,
    mode,
    signal,
  } = params;

  return fetch(
    url,
    {
      method,
      signal,
      mode,
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        ...headers,
      },
      body: JSON.stringify(body),
    },
  )
    .then((response) => response.text())
    .then((response) => JSON.parse(response));
};

export default useFetch;
