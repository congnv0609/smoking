export function incentiveList(query) {
    return new Promise((resolve, reject) => {
        axios.get('/backend/incentive/list', { params: query })
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}