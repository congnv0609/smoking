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
export function get(query) {
    return new Promise((resolve, reject) => {
        axios.get(`/backend/smokers/detail/${query.id}`)
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}