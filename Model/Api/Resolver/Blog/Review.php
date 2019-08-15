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
     * @var \Magefan\Blog\Model\CommentFactory
     */
    private $_commentFactory;

    public function __construct(
        \Magefan\Blog\Model\CommentFactory $commentFactory,
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
            'author_nickname' => $args['author'],
            'author_email' => '',
            'text' => $args['content']
        ]);

        $comment->setStatus(
            $this->getConfigValue(
                \Magefan\Blog\Helper\Config::COMMENT_STATUS
            )
        );

        if ($this->_session->getCustomerGroupId()) {
            /* Customer */
            $comment->setCustomerId(
                $this->_session->getCustomerId()
            )->setAuthorNickname(
                $this->_session->getCustomer()->getName()
            )->setAuthorEmail(
                $this->_session->getCustomer()->getEmail()
            )->setAuthorType(
                \Magefan\Blog\Model\Config\Source\AuthorType::CUSTOMER
            );
        } elseif ($this->getConfigValue(
            \Magefan\Blog\Helper\Config::GUEST_COMMENT
        )) {
            $comment->setCustomerId(0)->setAuthorType(
                \Magefan\Blog\Model\Config\Source\AuthorType::GUEST
            );
        } else {
            throw new \Magento\Framework\Exception\LocalizedException(__('Login to submit comment'));
        }

        $comment->save();

        return $this->load->resolver('blog/post/get', $args);
    }

    public function get($data)
    {
        /** @var $post \Magefan\Blog\Model\Post */
        $post = $data['post'];
        /** @var \Magefan\Blog\Model\ResourceModel\Comment\Collection $collection */
        $collection = $post->getComments();

        $comments = [];
        /** @var \Magefan\Blog\Model\Comment $comment */
        foreach ($collection->getItems() as $comment) {
            $comments[] = [
                'author' => $comment->getAuthorNickname(),
                'author_email' => $comment->getAuthorEmail(),
                'created_at' => $comment->getPublishDate(),
                'content' => $comment->getText(),
                'rating' => null
            ];
        }

        return [
            'content' => $comments,
            'totalElements' => $post->getCommentsCount()
        ];
    }

    public function getConfigValue($path)
    {
        return $this->_scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
