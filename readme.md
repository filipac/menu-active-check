I had the following scenario:
In a bootstrap admin theme I wanted the items in the Menu to pe marked as ACTIVE if I was on a certain controller.
I had to write a lot of code everytime so i made a blade tag for quick access to the rule.
Example how to use:

```
<li class="{@checkActive Dashboard|active}">
                      <a href="{{URL::to('/admin')}}"  >
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>@lang('admin.menu.dashboard')
                        </span>
                      </a>
                    </li>
```

Explanation: if the current controller is DashboardController the script will echo "active" so that the menu highlights. You can replace ```active``` with any class you want to add to the active menu items. This is a quick and rough package so if you want to make impovements, fork commit & merge request.

I wanted to have this for further Laravel projects.
