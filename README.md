# SOLID Principles - D

_**Note: The code in this repository is example code.**_

The 'D' in SOLID is for Dependency Inversion Principle. The principle is "High level modules should not should not depend upon low level modules. Both should depend upon abstractions." 

This principle encourages coding to an interface (abstraction).

It's easy to get this confused with Dependency Injection. Dependency Injection does'nt equal Dependency Inversion but dependency injection helps us to conform to Dependency Inversion.

### So what is meant buy high-level modules?
This is code which does'nt care about the specific details. I.e. `SocialMediaPostingService` cares about posting to social media that's it...

### What are low-level modules?
It's more concerned on the details i.e. `TwitterPoster`, `FacebookPoster` these care about the details as they will functionally do different things in order to post.

### Bringing it together...

If we were to bring that together we would have 

```
class SocialMediaPostingService
{
    public $socialMedia;
    
    // The Interface is implemented instead of a concrete class such as TwitterPoster or FacebookPoster
    public function __construct(SocialMediaInterface $socailMedia)
    {
        $this->socialMedia = $socialMedia;
    }
}
```

Each of the social media classes `TwitterPoster` and `FacebookPoster` would implement the `SocialMediaInterface`...

```
interface SocialMediaInterface
{
    public function post();
}

class TwitterPoster implements SocialMediaInterface
{
    public function post()
    {
        // Cares about how it posts to Twitter
        // Post to twitter
        return "Posted to Twitter...";
    }
}

class FacebookPoster implements SocialMediaInterface
{
    public function post()
    {
        // Cares about how it posts to Facebook
        // Post to facebook
        return "Posted to Facebook...";
    }
}
```

Why do we do that?
- Promotes decoupling

## Example

Within the directory `app/DependencyInversionPrinciple` you will find a directory and a couple of files. 

First look at the `OrderService.php` this is a simple class for servicing orders. It looks like it gets from the database and returns the values back. Within the constructor you will see `OrderRepositoryInterface $orderRepo` this is the interface we have coded to for our repository implementation. The `OrderService` does'nt care about the implementation of the OrderRepository all it cares about is it has the methods which it wants to use available to it.

Had we not coded to the interface we may have had...

`DBOrderRepository $orderRepo` which would be a concrete class if we were to want to change this to be a `FileOrderRepository` we would have to change that class to take `FileOrderRepository $orderRepo` instead. By relying on the interface `OrderRepositoryInterface $orderRepo` we don't need to worry about if it's from `FileOrderRepository` or `DBOrderRepository` we just care that the class passed is an implementation of the `OrderRepositoryInterface` so we can continue to use the methods we have without needing to change anything within the class. This plays hand in hand with the **Open-Closed Principle** and the **Liskov Substitution Principle**.
