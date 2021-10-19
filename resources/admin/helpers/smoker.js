export function smokers(query) {
    return new Promise((resolve, reject) => {
        axios.get('/backend/smokers/list', {params: query})
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}