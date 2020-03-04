export const state = () => ({
    clients: [],
    loading:false,
    links:null,
    pagination: null
})

export const getters = {
    clients(state) {
        return state.clients
    },
    loading(state) {
        return state.loading
    },
    links(state) {
        return state.links
    },
    pagination(state) {
        return state.pagination
    }
}
export const mutations = {
    setClients(state, clients) {
        state.clients = clients
    },
    setLoading(state, status) {
        state.loading = status
    },
    setPagination(state, pagination) {
        state.pagination = pagination
    },
    setLinks(state, links) {
        state.links = links
    }
}
export const actions = {
    async loadClients(context, filter) {
        context.commit('setLoading', true)
        const response = await this.$axios.get('/clients', {
            params: {
                letter: filter.letter,
                page: filter.page,
                limit: filter.limit 
            }
        })

        let clients = response.data.data;
        let links = response.data.links
        let pagination = response.data.meta
        context.commit('setPagination', pagination)
        context.commit('setLinks', links) 
        context.commit('setLoading', false)
        context.commit('setClients', clients)
    },
}
