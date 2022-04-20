<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Review extends Resolver
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $_scopeConfig;
    /**
     * @var \Magento\Customer\Model\Session
     */
    private $_session;
    /**
     * @var \Vuefront\Blog\Model\CommentFactory
     */
    private $_commentFactory;

    public function __construct(
        \Vuefront\Blog\Model\CommentFactory $commentFactory,
        \Magento\Customer\Model\Session $session,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_commentFactory = $commentFactory;
        $this->_session = $session;
        $this->_scopeConfig = $scopeConfig;
    }

    public function add($args)
    {
        $comment = $this->_commentFactory->create();
        $comment->setData([
            'post_id' => $args['id'],
            'rating' => $args['rating'],
            'author' => $args['author'],
            'description' => $args['content']
        ]);

        $comment->setStatus(0);

        $comment->save();

        return $this->load->resolver('blog/post/get', $args);
    }

    public function get($data)
    {
        /** @var $post \Vuefront\Blog\Model\Post */
        $post = $data['post'];
        /** @var \Vuefront\Blog\Model\ResourceModel\Comment\Collection $collection */
        $collection = $post->getComments();

        $comments = [];
        /** @var \Vuefront\Blog\Model\Comment $comment */
        foreach ($collection->getItems() as $comment) {
            $comments[] = [
                'author' => $comment->getAuthor(),
                'author_email' => '',
                'created_at' => $comment->getDateAdded(),
                'content' => $comment->getDescription(),
                'rating' => $comment->getRating()
            ];
        }

        return [
            'content' => $comments,
            'totalElements' => $post->getCommentsCount()
        ];
    }
}
