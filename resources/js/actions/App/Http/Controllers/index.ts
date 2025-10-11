import Auth from './Auth'
import DashboardController from './DashboardController'
import AccountController from './AccountController'
import TransactionController from './TransactionController'
import Settings from './Settings'

const Controllers = {
    Auth: Object.assign(Auth, Auth),
    DashboardController: Object.assign(DashboardController, DashboardController),
    AccountController: Object.assign(AccountController, AccountController),
    TransactionController: Object.assign(TransactionController, TransactionController),
    Settings: Object.assign(Settings, Settings),
}

export default Controllers