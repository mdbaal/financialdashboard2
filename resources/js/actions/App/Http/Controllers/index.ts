import Auth from './Auth'
import AccountController from './AccountController'
import Settings from './Settings'

const Controllers = {
    Auth: Object.assign(Auth, Auth),
    AccountController: Object.assign(AccountController, AccountController),
    Settings: Object.assign(Settings, Settings),
}

export default Controllers