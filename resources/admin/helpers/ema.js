export function emaList(query) {
    return new Promise((resolve, reject) => {
        axios.get('/backend/ema/list', { params: query })
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}