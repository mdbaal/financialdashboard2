import {
    applyUrlDefaults,
    queryParams,
    type RouteDefinition,
    type RouteFormDefinition,
    type RouteQueryOptions
} from './../../wayfinder'

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
export const show = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get", "head"],
    url: '/dashboard/accounts/{account}',
} satisfies RouteDefinition<["get", "head"]>

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
show.url = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = {account: args}
    }

    if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
        args = {account: args.id}
    }

    if (Array.isArray(args)) {
        args = {
            account: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        account: typeof args.account === 'object'
            ? args.account.id
            : args.account,
    }

    return show.definition.url
        .replace('{account}', parsedArgs.account.toString())
        .replace(/\/+$/, '') + queryParams(options)
}

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
show.get = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
show.head = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
const showForm = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: show.url(args, options),
    method: 'get',
})

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
showForm.get = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: show.url(args, options),
    method: 'get',
})

/**
 * @see \App\Http\Controllers\AccountController::show
 * @see app/Http/Controllers/AccountController.php:27
 * @route '/dashboard/accounts/{account}'
 */
showForm.head = (args: { account: number | { id: number } } | [account: number | { id: number }] | number | {
    id: number
}, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: show.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

show.form = showForm

/**
 * @see \App\Http\Controllers\AccountController::store
 * @see app/Http/Controllers/AccountController.php:39
 * @route '/dashboard/accounts'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

store.definition = {
    methods: ["put"],
    url: '/dashboard/accounts',
} satisfies RouteDefinition<["put"]>

/**
 * @see \App\Http\Controllers\AccountController::store
 * @see app/Http/Controllers/AccountController.php:39
 * @route '/dashboard/accounts'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
 * @see \App\Http\Controllers\AccountController::store
 * @see app/Http/Controllers/AccountController.php:39
 * @route '/dashboard/accounts'
 */
store.put = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

/**
 * @see \App\Http\Controllers\AccountController::store
 * @see app/Http/Controllers/AccountController.php:39
 * @route '/dashboard/accounts'
 */
const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
 * @see \App\Http\Controllers\AccountController::store
 * @see app/Http/Controllers/AccountController.php:39
 * @route '/dashboard/accounts'
 */
storeForm.put = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

store.form = storeForm

/**
 * @see \App\Http\Controllers\AccountController::update
 * @see app/Http/Controllers/AccountController.php:52
 * @route '/dashboard/accounts/{account}'
 */
export const update = (args: {
    account: string | number
} | [account: string | number] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

update.definition = {
    methods: ["patch"],
    url: '/dashboard/accounts/{account}',
} satisfies RouteDefinition<["patch"]>

/**
 * @see \App\Http\Controllers\AccountController::update
 * @see app/Http/Controllers/AccountController.php:52
 * @route '/dashboard/accounts/{account}'
 */
update.url = (args: {
    account: string | number
} | [account: string | number] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = {account: args}
    }

    if (Array.isArray(args)) {
        args = {
            account: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        account: args.account,
    }

    return update.definition.url
        .replace('{account}', parsedArgs.account.toString())
        .replace(/\/+$/, '') + queryParams(options)
}

/**
 * @see \App\Http\Controllers\AccountController::update
 * @see app/Http/Controllers/AccountController.php:52
 * @route '/dashboard/accounts/{account}'
 */
update.patch = (args: {
    account: string | number
} | [account: string | number] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

/**
 * @see \App\Http\Controllers\AccountController::update
 * @see app/Http/Controllers/AccountController.php:52
 * @route '/dashboard/accounts/{account}'
 */
const updateForm = (args: {
    account: string | number
} | [account: string | number] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PATCH',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
 * @see \App\Http\Controllers\AccountController::update
 * @see app/Http/Controllers/AccountController.php:52
 * @route '/dashboard/accounts/{account}'
 */
updateForm.patch = (args: {
    account: string | number
} | [account: string | number] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PATCH',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

update.form = updateForm

/**
 * @see \App\Http\Controllers\AccountController::destroy
 * @see app/Http/Controllers/AccountController.php:72
 * @route '/dashboard/accounts'
 */
export const destroy = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/dashboard/accounts',
} satisfies RouteDefinition<["delete"]>

/**
 * @see \App\Http\Controllers\AccountController::destroy
 * @see app/Http/Controllers/AccountController.php:72
 * @route '/dashboard/accounts'
 */
destroy.url = (options?: RouteQueryOptions) => {
    return destroy.definition.url + queryParams(options)
}

/**
 * @see \App\Http\Controllers\AccountController::destroy
 * @see app/Http/Controllers/AccountController.php:72
 * @route '/dashboard/accounts'
 */
destroy.delete = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

/**
 * @see \App\Http\Controllers\AccountController::destroy
 * @see app/Http/Controllers/AccountController.php:72
 * @route '/dashboard/accounts'
 */
const destroyForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
 * @see \App\Http\Controllers\AccountController::destroy
 * @see app/Http/Controllers/AccountController.php:72
 * @route '/dashboard/accounts'
 */
destroyForm.delete = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

destroy.form = destroyForm

const accounts = {
    show: Object.assign(show, show),
    store: Object.assign(store, store),
    update: Object.assign(update, update),
    destroy: Object.assign(destroy, destroy),
}

export default accounts