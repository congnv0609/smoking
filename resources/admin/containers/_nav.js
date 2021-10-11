export default [
  {
    _name: 'CSidebarNav',
    _children: [
      {
        _name: 'CSidebarNavItem',
        name: 'Dashboard',
        to: '/admin/dashboard',
        icon: 'cil-speedometer',
        badge: {
          color: 'primary',
          text: 'NEW'
        }
      },
      {
        _name: 'CSidebarNavTitle',
        _children: ['Theme']
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Colors',
        to: '/admin/theme/colors',
        icon: 'cil-drop'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Typography',
        to: '/admin/theme/typography',
        icon: 'cil-pencil'
      },
      {
        _name: 'CSidebarNavTitle',
        _children: ['Components']
      },
      {
        _name: 'CSidebarNavDropdown',
        name: 'Base',
        route: '/admin/base',
        icon: 'cil-puzzle',
        items: [
          {
            name: 'Breadcrumbs',
            to: '/admin/base/breadcrumbs'
          },
          {
            name: 'Cards',
            to: '/admin/base/cards'
          },
          {
            name: 'Carousels',
            to: '/admin/base/carousels'
          }, 
          {
            name: 'Collapses',
            to: '/admin/base/collapses'
          },
          {
            name: 'Forms',
            to: '/admin/base/forms'
          },
          {
            name: 'Jumbotrons',
            to: '/admin/base/jumbotrons'
          },
          {
            name: 'List Groups',
            to: '/admin/base/list-groups'
          },
          {
            name: 'Navs',
            to: '/admin/base/navs'
          },
          {
            name: 'Navbars',
            to: '/admin/base/navbars'
          },
          {
            name: 'Paginations',
            to: '/admin/base/paginations'
          },
          {
            name: 'Popovers',
            to: '/admin/base/popovers'
          },
          {
            name: 'Progress Bars',
            to: '/admin/base/progress-bars'
          },
          {
            name: 'Switches',
            to: '/admin/base/switches'
          },
          {
            name: 'Tables',
            to: '/admin/base/tables'
          },
          {
            name: 'Tabs',
            to: '/admin/base/tabs'
          },
          {
            name: 'Tooltips',
            to: '/admin/base/tooltips'
          }
        ]
      },
      {
        _name: 'CSidebarNavDropdown',
        name: 'Buttons',
        route: '/admin/buttons',
        icon: 'cil-cursor',
        items: [
          {
            name: 'Buttons',
            to: '/admin/buttons/standard-buttons'
          },
          {
            name: 'Button Dropdowns',
            to: '/admin/buttons/dropdowns'
          },
          {
            name: 'Button Groups',
            to: '/admin/buttons/button-groups'
          },
          {
            name: 'Brand Buttons',
            to: '/admin/buttons/brand-buttons'
          }
        ]
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Charts',
        to: '/admin/charts',
        icon: 'cil-chart-pie'
      },
      {
        _name: 'CSidebarNavDropdown',
        name: 'Icons',
        route: '/admin/icons',
        icon: 'cil-star',
        items: [
          {
            name: 'CoreUI Icons',
            to: '/admin/icons/coreui-icons',
            badge: {
              color: 'info',
              text: 'NEW'
            }
          },
          {
            name: 'Brands',
            to: '/admin/icons/brands'
          },
          {
            name: 'Flags',
            to: '/admin/icons/flags'
          }
        ]
      },
      {
        _name: 'CSidebarNavDropdown',
        name: 'Notifications',
        route: '/admin/notifications',
        icon: 'cil-bell',
        items: [
          {
            name: 'Alerts',
            to: '/admin/notifications/alerts'
          },
          {
            name: 'Badges',
            to: '/admin/notifications/badges'
          },
          {
            name: 'Modals',
            to: '/admin/notifications/modals'
          }
        ]
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Widgets',
        to: '/admin/widgets',
        icon: 'cil-calculator',
        badge: {
          color: 'primary',
          text: 'NEW',
          shape: 'pill'
        }
      },
      {
        _name: 'CSidebarNavDivider',
        _class: 'm-2'
      },
      {
        _name: 'CSidebarNavTitle',
        _children: ['Extras']
      },
      {
        _name: 'CSidebarNavDropdown',
        name: 'Pages',
        route: '/admin/pages',
        icon: 'cil-star',
        items: [
          {
            name: 'Login',
            to: '/admin/pages/login'
          },
          {
            name: 'Register',
            to: '/admin/pages/register'
          },
          {
            name: 'Error 404',
            to: '/admin/pages/404'
          },
          {
            name: 'Error 500',
            to: '/admin/pages/500'
          }
        ]
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Download CoreUI',
        href: 'http://coreui.io/vue/',
        icon: { name: 'cil-cloud-download', class: 'text-white' },
        _class: 'bg-success text-white',
        target: '_blank'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Try CoreUI PRO',
        href: 'http://coreui.io/pro/vue/',
        icon: { name: 'cil-layers', class: 'text-white' },
        _class: 'bg-danger text-white',
        target: '_blank'
      }
    ]
  }
]